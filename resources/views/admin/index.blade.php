@extends('admin.layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="quick-views admin-section">
        <div class="view">
            <div class="number">
                <h3>200</h3>
            </div>
            <p>Users</p>
        </div>

        <div class="view">
            <div class="number">
                <h3>250</h3>
            </div>
            <p>Products Sold</p>
        </div>

        <div class="view">
            <div class="number">
                <h3>NGN 20,000</h3>
            </div>
            <p>Monthly Revenue</p>
        </div>

        <div class="view">
            <div class="number">
                <h3>30</h3>
            </div>
            <p>Pending Orders</p>
        </div>
    </div>

    <div class="product-continer admin-section">
        <h3 class="section-title">Add Product</h3>
        <form action="">
            <div class="input-field">
                <label for=""> <h4>Category</h4> </label>
                <select name="" id="">
                    <option value="">Option 1</option>
                    <option value="">Option 2</option>
                    <option value="">Option 3</option>
                </select>
            </div>

            <div class="input-field">
                <label for=""> <h4>Brand</h4> </label>
                <select name="" id="">
                    <option value="">Option 1</option>
                    <option value="">Option 2</option>
                    <option value="">Option 3</option>
                </select>
            </div>

            <div class="input-field">
                <label for="">  <h4>Product Name</h4> </label>
                <input type="text">
            </div>

            <div class="input-field">
                <label for=""> <h4>Product Description</h4> </label>
                <textarea name="" id="" cols="30" rows="10"></textarea>
            </div>

            <div class="input-field">
                <label for=""> <h4>Add Images</h4> </label>
                <input type="file">
            </div>

            <div class="input-field">
                <button type="submit" class="btn btn--md">Add Product</button>
            </div>
        </form>
    </div>

    <div class="product-continer admin-section">
        <h3 class="section-title">Products</h3>
        <div>
            <div class="product-box-container">
                <div class="flex product-box">
                    <div class="flex-2 left">
                        <img src="{{ asset('assets/product-1-1.jpg') }}" alt="">
                        <div>
                            <h4 class="product-title">Product Name</h4>
                            <div class="flex">
                                <p><strong>Price:</strong></p>
                                <p>NGN 2,000</p>
                            </div>
                            <div class="flex">
                                <p><strong>Category:</strong></p>
                                <p>Clothing</p>
                            </div>
                            <div class="flex">
                                <p><strong>Available Stock:</strong></p>
                                <p>20 Units</p>
                            </div>
                            <div style="margin-top: .5rem">
                                <a href="" class="btn btn--sm">Edit</a>
                                <a href="" class="btn btn--sm delete">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex product-box">
                    <div class="flex-2 left">
                        <img src="{{ asset('assets/product-1-1.jpg') }}" alt="">
                        <div>
                            <h4 class="product-title">Product Name</h4>
                            <div class="flex">
                                <p><strong>Price:</strong></p>
                                <p>NGN 2,000</p>
                            </div>
                            <div class="flex">
                                <p><strong>Category:</strong></p>
                                <p>Clothing</p>
                            </div>
                            <div class="flex">
                                <p><strong>Available Stock:</strong></p>
                                <p>20 Units</p>
                            </div>
                            <div style="margin-top: .5rem">
                                <a href="" class="btn btn--sm">Edit</a>
                                <a href="" class="btn btn--sm delete">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex product-box">
                    <div class="flex-2 left">
                        <img src="{{ asset('assets/product-1-1.jpg') }}" alt="">
                        <div>
                            <h4 class="product-title">Product Name</h4>
                            <div class="flex">
                                <p><strong>Price:</strong></p>
                                <p>NGN 2,000</p>
                            </div>
                            <div class="flex">
                                <p><strong>Category:</strong></p>
                                <p>Clothing</p>
                            </div>
                            <div class="flex">
                                <p><strong>Stock:</strong></p>
                                <p>20 Units</p>
                            </div>
                            <div style="margin-top: .5rem">
                                <a href="" class="btn btn--sm">Edit</a>
                                <a href="" class="btn btn--sm delete">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex product-box">
                    <div class="flex-2 left">
                        <img src="{{ asset('assets/product-1-1.jpg') }}" alt="">
                        <div>
                            <h4 class="product-title">Product Name</h4>
                            <div class="flex">
                                <p><strong>Price:</strong></h5>
                                <p>NGN 2,000</p>
                            </div>
                            <div class="flex">
                                <p><strong>Category:</strong></p>
                                <p>Clothing</p>
                            </div>
                            <div class="flex">
                                <p><strong>Available Stock:</strong></p>
                                <p>20 Units</p>
                            </div>
                            <div style="margin-top: .5rem">
                                <a href="" class="btn btn--sm">Edit</a>
                                <a href="" class="btn btn--sm delete">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex product-box">
                    <div class="flex-2 left">
                        <img src="{{ asset('assets/product-1-1.jpg') }}" alt="">
                        <div>
                            <h4 class="product-title">Product Name</h4>
                            <div class="flex">
                                <p><strong>Price:</strong></h5>
                                <p>NGN 2,000</p>
                            </div>
                            <div class="flex">
                                <p><strong>Category:</strong></p>
                                <p>Clothing</p>
                            </div>
                            <div class="flex">
                                <p><strong>Available Stock:</strong></p>
                                <p>20 Units</p>
                            </div>
                            <div style="margin-top: .5rem">
                                <a href="" class="btn btn--sm">Edit</a>
                                <a href="" class="btn btn--sm delete">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex product-box">
                    <div class="flex-2 left">
                        <img src="{{ asset('assets/product-1-1.jpg') }}" alt="">
                        <div>
                            <h4 class="product-title">Product Name</h4>
                            <div class="flex">
                                <p><strong>Price:</strong></h5>
                                <p>NGN 2,000</p>
                            </div>
                            <div class="flex">
                                <p><strong>Category:</strong></p>
                                <p>Clothing</p>
                            </div>
                            <div class="flex">
                                <p><strong>Available Stock:</strong></p>
                                <p>20 Units</p>
                            </div>
                            <div style="margin-top: .5rem">
                                <a href="" class="btn btn--sm">Edit</a>
                                <a href="" class="btn btn--sm delete">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="admin-section">
        <h3 class="section-title">Orders</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>Product Name</td>
                    <td>2</td>
                    <td>NGN 4,000</td>
                    <td>Pending</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Jane Smith</td>
                    <td>Product Name</td>
                    <td>1</td>
                    <td>NGN 2,000</td>
                    <td>Completed</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
