<x-admin-master>

@section('content')


    <!-- page content -->
  <div class="right_col" role="main">
        <!-- top tiles -->
        <div class="row" style="display: inline-block;" >
         
        </div>
        <!-- /top tiles -->

        <div class="row">
            <div class="col-md-4 col-sm-4 ">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Recent Posts </h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>

                <div class="x_content">
               
                </div>
              </div>
            </div>

            <div class="col-md-4 col-sm-4 ">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Recent Comments </h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>

                <div class="x_content">
               
                </div>
              </div>
            </div>

            <div class="col-md-4 col-sm-4 ">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Recent Users </h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>

               
              </div>
            </div>
          </div>
      </div>

  </div>
  <!-- /page content -->

@stop
@section('dashboard_script')
    <script>
      function myFunction(id) {
        var dots = document.getElementById("dots"+ "-" + id);
        var moreText = document.getElementById("more"+ "-" + id);
        var btnText = document.getElementById("myBtn"+ "-" + id);

        if (dots.style.display === "none") {
            dots.style.display = "inline";
            btnText.innerHTML = "Read More";
            moreText.style.display = "none";
        } else {
          dots.style.display = "none";
          btnText.innerHTML = "Read less";
          moreText.style.display = "inline";
        }
      }
      function orderFun(id) {
        var dots = document.getElementById("order_dots"+ "-" + id) ;
        var moreText = document.getElementById("order_more" + "-" + id) ;
        var btnText = document.getElementById("orderBtn" + "-" + id);

        if (dots.style.display === "none") {
            dots.style.display = "inline";
            btnText.innerHTML = "Read More";
            moreText.style.display = "none";
        } else {
          dots.style.display = "none";
          btnText.innerHTML = "Read less";
          moreText.style.display = "inline";
        }
      }

      function feedbackFun(id) {
        var dots = document.getElementById("feedback_dots"+ "-" + id);
        var moreText = document.getElementById("feedback_more"+ "-" + id);
        var btnText = document.getElementById("feedbackBtn"+ "-" + id);

        if (dots.style.display === "none") {
            dots.style.display = "inline";
            btnText.innerHTML = "Read More";
            moreText.style.display = "none";
        } else {
          dots.style.display = "none";
          btnText.innerHTML = "Read less";
          moreText.style.display = "inline";
        }
      }
    </script>

@endsection
</x-admin-master>
