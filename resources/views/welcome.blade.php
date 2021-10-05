<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Country State City</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <section class="container">
        <div class="card">
            <div class="card-header">
                <h5>Country State City</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label"></label>
                            <select name="country" id="country" class="form-control">
                                <option value="">Select Country</option>
                                @foreach(App\Models\Country::orderBy('name')->get() as $key => $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label"></label>
                            <select name="state" id="state" class="form-control">
                                <option value="">Select State</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label"></label>
                            <select name="city" id="city" class="form-control">
                                <option value="">Select City</option>

                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
        $('#country').on('change', function() {
                get_state_by_country();
            });
                function get_state_by_country(){
                    var country_id = $('#country').val();
                    $.post('{{route('getStates')}}',{_token:'{{ csrf_token() }}', country_id:country_id}, function(data){
                        $('#state').html(null);
                        $('#state').append($('<option value="">Select State</option>', {

                        }));
                        for (var i = 0; i < data.length; i++) {
                            $('#state').append($('<option>', {
                                value: data[i].id,
                                text: data[i].name
                            }));

                        }
                });
            }
     </script>
     <script type="text/javascript">
        $('#state').on('change', function() {
                get_state_by_state();
            });
                function get_state_by_state(){
                    var state_id = $('#state').val();
                    $.post('{{route('getCities')}}',{_token:'{{ csrf_token() }}', state_id:state_id}, function(data){
                        $('#city').html(null);
                        $('#city').append($('<option value="">Select City</option>', {

                        }));
                        for (var i = 0; i < data.length; i++) {
                            $('#city').append($('<option>', {
                                value: data[i].id,
                                text: data[i].name
                            }));

                        }
                });
            }
     </script>
</html>
