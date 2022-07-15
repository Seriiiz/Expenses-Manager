<div class="header bg-gradient-success pb-8 pt-5 pt-md-8">
    <div class="container">
        @include('layouts.inc.messages')
        <div class="table-responsive">
            <table class="table align-items-center">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Expense Categories</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($categories ?? '') > 0)
                        @foreach($categories ?? '' as $category)
                            <tr class="text-white">
                                <th scope="row">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <span class="mb-0 text-sm">{{$category->display_name}}</span>
                                        </div>
                                    </div>
                                </th>
                                <td>
                                    <?php
                                        $category_name = $category->display_name;
                                        $totalAmount = DB::table('expenses')->where('user_id',$userId)->where('expense_category', $category_name)->sum('amount');;
                                        echo number_format($totalAmount, 0);
                                    ?>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="text-white">
                            <th scope="row">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <span class="mb-0 text-sm">No Expenses Found.</span>
                                    </div>
                                </div>
                            </th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>