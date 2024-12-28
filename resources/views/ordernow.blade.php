@extends('master')
@section("content")
    <div style="height: auto;margin: 50px;">
        <div class="col-sm-6">
            <table class="table">

                <tbody>
                <tr>
                    <td>Amount</td>
                    <td>$ {{$total}}</td>
                </tr>
                <tr>
                    <td>Tax</td>
                    <td>$ 0</td>
                </tr>
                <tr>
                    <td>Delivery Charge</td>
                    <td>$ 10</td>
                </tr>
                <tr>
                    <td>Total Amount</td>
                    <td>$ {{$total+10}}</td>
                </tr>
                </tbody>
            </table>
            <div>
                <form action="/place-order" method="POST" >
                    @csrf
                    <div class="form-group">
                        <label>
                            <textarea name="address" placeholder="Enter your address" class="form-control" ></textarea>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Payment Method</label> <br> <br>
                        <input type="radio" value="paypal" name="payment"> <span>online payment</span> <br> <br>
                        <input type="radio" value="emi" name="payment"> <span>EMI payment</span> <br><br>
                        <input type="radio" value="cod" name="payment"> <span>Payment on Delivery</span> <br> <br>

                    </div>
                    <button type="submit" class="btn btn-success">Order Now</button>
                </form>
            </div>
        </div>
    </div>
@endsection
