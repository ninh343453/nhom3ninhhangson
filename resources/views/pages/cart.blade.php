@extends('admin.layout.head')
@section('title', 'Cart')

@section('content')

    <span id="status"></span>

    <table id="cart" class="table table-hover table-condensed">

        <thead>

            <tr>

                <th style="width:50%">Product</th>

                <th style="width:10%">Price</th>

                <th style="width:8%">Quantity</th>

                <th style="width:22%" class="text-center">Subtotal</th>

                <th style="width:10%"></th>

            </tr>

        </thead>

        <tbody>

            <?php $total = 0; ?>

            @if (session('cart'))

                @foreach ((array) session('cart') as $id => $details)
                    <?php $total += $details['price'] * $details['quantity']; ?>

                    <tr>

                        <td data-th="Product">

                            <div class="row">

                                <div class="col-sm-3 hidden-xs"><img src="{{ asset('image/music/' . $details['photo']) }}"
                                        width="100" height="100" class="img-responsive" /></div>

                                <div class="col-sm-9">

                                    <h4 class="nomargin">{{ $details['name'] }}</h4>

                                </div>

                            </div>

                        </td>

                        <td data-th="Price">${{ $details['price'] }}</td>

                        <td data-th="Quantity">

                            <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" />

                        </td>

                        <td data-th="Subtotal" class="text-center">$<span
                                class="product-subtotal">{{ $details['price'] * $details['quantity'] }}</span></td>

                        <td class="actions" data-th="">

                            <a href="{{ route('update-cart', $id) }}" class="btn btn-xs btn-info pull-right"><i
                                    class="fa fa-refresh"></i></a>

                            <a class="btn btn-info btn-sm update-cart" href="{{ route('update-cart', $id) }}"><i
                                    class="fa fa-refresh"></i></a>

                           

                            <i class="fa fa-circle-o-notch fa-spin btn-loading" style="font-size:24px; display: none"></i>

                        </td>

                    </tr>
                @endforeach

            @endif

        </tbody>

        <tfoot>

            <tr class="visible-xs">

                <td class="text-center"><strong>Total $<span class="cart-total">{{ $total }}</span></strong></td>

            </tr>

            <tr>

                <td><a href="{{ url('/home') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue
                        Shopping</a></td>

                <td colspan="2" class="hidden-xs"></td>

                <td class="hidden-xs text-center"><strong>Total $<span
                            class="cart-total">{{ $total }}</span></strong></td>

            </tr>

        </tfoot>

    </table>


