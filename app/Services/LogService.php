<?php

namespace App\Services;

use Exception;
use App\Repositories\LogRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

class LogService extends Service
{
    public function __construct(LogRepository $logs)
    {
        $this->repository = $logs;
    }

    public function log($code, $model, $action, $data = null)
    {
        $content = [
            'code' => $code,
            'message' => config('setting.code')[(int) $code],
        ];

        if (!is_null($data)) {
            $content = array_merge($content, [
                'data' => $data,
            ]);
        }

        $this->repository->write($content, $model, $action, $code);
    }

    public function logException($exception, $model, $action)
    {
        $code = (int) $exception->getCode();

        $content = [
            'code' => $code,
            'message' => $exception->getMessage(),
            'exception' => class_basename($exception),
        ];

        $this->repository->write($content, $model, $action, $code);
    }

    public function getAll()
    {
        return $this->repository->findAll('id', 'asc');
    }

    public function getAllPaginated(Request $request)
    {
        $draw = $request->input('draw'); // Draw counter. This is used by DataTables to ensure that the Ajax returns from server-side processing requests are drawn in sequence by DataTables.
        $firstItem = $request->input("start"); // Paging first record indicator
        $itemPerPage = $request->input("length"); // Number of records that the table can display in the current draw

        $columns = $request->input('columns');
        $columnNames = Arr::pluck($columns, 'name');

        $searchValue = $request->input("search.value"); // Global search value. To be applied to all columns which have searchable as true.
        $sortColumnName = $columnNames[$request->input('order.0.column')];
        $sortColumnDirection = $request->input('order.0.dir');

        $searchAttributes = Arr::pluck(
            Arr::where($columns, function ($value) {
                return $value['searchable'] == "true";
            }
        ), 'name');

        foreach ($searchAttributes as $key => $value) {
            $attributes[$value] = $searchValue;
        }

         $items = $this->repository->findAllPaginated($attributes, 'User', $sortColumnName, $sortColumnDirection, $firstItem, $itemPerPage);

        foreach ($items as $key => $value) {
            $value = Arr::add($value, 'actionLinks', $value->present()->actionLink);
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $this->getRecordCount(),
            "iTotalDisplayRecords" => $this->getRecordCountWithFilter($attributes),
            "aaData" => $items
        );

        return $response;
    }

    public function getRecordCount()
    {
        return $this->repository->count();
    }

    public function getRecordCountWithFilter($attributes)
    {
        return $this->repository->countWithFilter($attributes);
    }
}
