@extends('layouts.app')

@section('title', 'Listado de productos')

@section('body-class', 'product-page')

@section('content')
    <div class="header header-filter"
        style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
    </div>

    <div class="main main-raised">
        <div class="container">
            <div class="section text-center">
                <h2 class="title">{{ __('Listado de productos') }}</h2>
                <a href="{{ url('/admin/products/create') }}"
                    class="btn btn-primary btn-round">{{ __('Nuevo producto') }}</a>
                <div class="team">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>{{ __('Nombre') }}</th>
                                <th>{{ __('Descripción') }}</th>
                                <th class="text-center">{{ __('Categoría') }}</th>
                                <th class="text-right">{{ __('Precio') }}</th>
                                <th class="text-center">{{ __('Opciones') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td class="text-center">{{ $product->id }}</td>
                                    <td class="text-left col-md-2">{{ $product->name }}</td>
                                    <td class="text-left col-md-4">{{ $product->description }}</td>
                                    <td class="text-center">
                                        {{ $product->category ? $product->category->name : 'General' }}</td>
                                    <td class="text-right">{{ $product->price }}&euro;</td>
                                    <td class="td-actions text-right">
                                        <form method="post" action="{{ url('/admin/products/' . $product->id . '/delete') }}">
                                            {{ csrf_field() }}
                                            {{-- method_field('DELETE') --}}
                                            <a type="button" rel="tooltip" title="{{ __('Ver producto') }}"
                                                class="btn btn-info btn-simple btn-xs">
                                                <i class="fa fa-info"></i>
                                            </a>
                                            <a href="{{ url('/admin/products/' . $product->id . '/edit') }}" rel="tooltip"
                                                title="{{ __('Editar producto') }}"
                                                class="btn btn-success btn-simple btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button type="submit" rel="tooltip" title="{{ __('Eliminar') }}"
                                                class="btn btn-danger btn-simple btn-xs">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $products->links() }}
                </div>

            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <nav class="pull-left">
                <ul>
                    <li>
                        <a href="http://www.creative-tim.com">
                            Creative Tim
                        </a>
                    </li>
                    <li>
                        <a href="http://presentation.creative-tim.com">
                            About Us
                        </a>
                    </li>
                    <li>
                        <a href="http://blog.creative-tim.com">
                            Blog
                        </a>
                    </li>
                    <li>
                        <a href="http://www.creative-tim.com/license">
                            Licenses
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="copyright pull-right">
                &copy; 2016, made with <i class="fa fa-heart heart"></i> by Creative Tim
            </div>
        </div>
    </footer>

@endsection
