@extends('cms.contractor.layout.template')
@section('main')

<div class="container-fluid">


    <div class="d-flex justify-content-between mb-2 mt-2">
        <div class="d-flex justify-content-between m-2">
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-style1">
                        <li class="breadcrumb-item">
                            <a href="#"><?= get_label('home', 'Home') ?></a>
                        </li>
                        <li class="breadcrumb-item active">
                            All Orders ({{ $orders->count() }})
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div id="cover-spin" style="display:none;" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        <div>
            <x-formy.button_insert_js
                table="order_table"
                selectionId="offcanvas-add-order"
                dataId="0"
                title="Add new Order"
                class="btn btn-primary px-5"
                icon="fa-solid fa-plus me-2"
            ></x-formy.button_insert_js>
            {{-- <a href="javascript:void(0)" data-table="purchase_table" id="offcanvas-add-purchase" data-id="0">
                <button type="button" class="btn btn-primary px-5" data-bs-toggle="tooltip" data-bs-placement="right"
                    data-bs-original-title=" <?= get_label('add_new_purchase', 'Add new purchase order') ?>">
                    <i class="fa-solid fa-plus me-2"></i>Add new order
                </button>
            </a> --}}
        </div>
    </div>

    <x-cms.orders.contractor-order-card />
</div>
@include('cms.modals.contractor.orders_modal')

@endsection

@push('script')
<script src="{{ asset('assets/js/pages/cms/order_header.js') }}"></script>
@endpush