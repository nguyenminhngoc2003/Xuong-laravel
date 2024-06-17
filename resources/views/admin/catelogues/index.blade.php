@extends('admin.layouts.master')

@section('title')
Danh sách Danh mục sản phẩm
@endsection

@section('content')
<a href="{{ route('admin.catelogues.create') }}" class="btn btn-primary mb-3">Add New</a>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Cover</th>
        <th>Is Active</th>
        <th>Created at</th>
        <th>Updated at</th>
        <th>Action</th>
    </tr>

    @foreach($data as $item)
    <span class="badge badge-primary">Yes</span>
    <span class="badge badge-danger">No</span>
    <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->name }}</td>
        <td>
            <img src="{{ \Storage::url($item->cover) }}" alt="đồng hồ" width="50px">
        </td>
        <td>{!! $item->is_active ? '<span class="badge bg-primary">Yes</span>'
            : '<span class="badge bg-danger">No</span>' !!}</td>
        <td>{{ $item->created_at }}</td>
        <td>{{ $item->updated_at }}</td>
        <td>
            <a href="{{ route('admin.catelogues.show', $item->id) }}" class="btn btn-info mb-3">Xem</a>
            <a href="{{ route('admin.catelogues.edit', $item->id) }}" class="btn btn-warning mb-3">Sửa</a>

            <a href="{{ route('admin.catelogues.destroy', $item->id) }}" onclick="return confirm('Bạn chắc chắn muốn xóa???')" class="btn btn-danger mb-3">Xóa</a>
        </td>
    </tr>
    @endforeach
</table>

{{ $data->links() }}
@endsection