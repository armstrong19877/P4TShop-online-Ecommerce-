<!-- jQuery Plugins -->
		<script src="{{asset('js/jquery.min.js')}}"></script>
		<script src="{{asset('js/bootstrap.min.js')}}"></script>
		<script src="{{asset('js/slick.min.js')}}"></script>
		<script src="{{asset('js/nouislider.min.js')}}"></script>
		<script src="{{asset('js/jquery.zoom.min.js')}}"></script>
		<script src="{{asset('js/main.js')}}"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

		<script type="text/javascript">

        $(".update-cart").click(function (e) {

           e.preventDefault();

           var ele = $(this);
            $.ajax({
               url: '{{ url('update-cart') }}',
               method: "patch",
               data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), qty: ele.parents("tr").find(".qty").val()},
			   success: function (response) {
                   window.location.reload();
               }
            });
        });

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });


        $(".update-product-cart").click(function (e) {
           e.preventDefault();
           // qty= $(this).closest('.update-cart-inproduct').find(".qty").val();
            alert(qty);
           var ele = $(this);
            $.ajax({
               url: '{{ url('update-product-cart') }}',
               method: "patch",
               data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), qty: $(this).closest('.update-cart-inproduct').find(".qty").val()},
			   success: function (response) {
                   window.location.reload();
               }
            });
        });


    </script>