<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;

trait FiltersAndSorts
{
    protected function applySearch($query, Request $request, array $searchableFields): void
    {
        if ($request->filled('search')) {
            $search = $request->str('search');
            $query->where(function ($q) use ($search, $searchableFields) {
                foreach ($searchableFields as $field) {
                    $q->orWhere($field, 'like', "%{$search}%");
                }
            });
        }
    }

    protected function applySort($query, Request $request, array $sortableFields, string $defaultSort = 'created_at'): void
    {
        $sortField = in_array($request->str('sort')->toString(), $sortableFields)
            ? $request->str('sort')->toString()
            : $defaultSort;

        $sortDirection = $request->str('direction')->toString() === 'asc' ? 'asc' : 'desc';

        $query->orderBy($sortField, $sortDirection);
    }

    protected function perPage(Request $request): int
    {
        return max(1, min(100, (int) $request->integer('per_page', 15)));
    }

    protected function paginatedResponse($paginator, string $resourceKey, string $resourceClass): array
    {
        return [
            $resourceKey => $resourceClass::collection($paginator),
            'meta' => [
                'current_page' => $paginator->currentPage(),
                'last_page' => $paginator->lastPage(),
                'per_page' => $paginator->perPage(),
                'total' => $paginator->total(),
            ],
        ];
    }
}
