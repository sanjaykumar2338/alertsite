@extends('frontend.layout.homepagelayout')

@section('content')

    <style>
        .container {
            display: flex;
            justify-content: space-between;
            max-width: 960px; /* Set your desired maximum width */
            margin: 0 auto;  /* Center the container */
        }

        .cta-sidebar {
            width: 30%;
            box-sizing: border-box; /* Include padding and border in the width */
            padding: 15px; /* Optional: Add padding for better appearance */
        }

        .cta-sidebar div {
            margin-bottom: 20px; /* Optional: Add margin between the two divs */
        }

        .cta-sidebar a {
            display: inline-block; /* Ensure the anchor behaves as a block element */
            padding: 10px 15px; /* Optional: Add padding to the anchor */
            background-color: #8529cd; /* Set your desired background color */
            color: #fff; /* Set your desired text color */
            text-decoration: none; /* Remove underline from the anchor */
        }

    </style>

    <div class="container" style="margin-bottom: 7rem">
        <div class="cta-sidebar">
            <div>
                <p>Stay on top of <span style='color: #8529cd; width:auto;'>Rakuten</span> deals effortlessly with
                    our
                    tracking and alert system. Never miss out on savings again.</p>
                <a href="https://www.rakuten.com/r/CARRIE21277?eeid=28187&amp;fbclid=IwAR1nvZOOBFIuGjHq-IaiM73dK8iVQaHBqHWOpa--7xWwPwdWYhSXTdoTMVw"
                   class="cta-btn">Join Now!</a>
            </div>
            <div>
                <p>Already saving with TrackRak?</p>
                <a href="https://www.rakuten.com/r/CARRIE21277?eeid=28187&amp;fbclid=IwAR1nvZOOBFIuGjHq-IaiM73dK8iVQaHBqHWOpa--7xWwPwdWYhSXTdoTMVw"
                   class="cta-btn">Login Now!</a>
            </div>
        </div>
        <div class="cta-sidebar" style="width: 70%;">
            {!! $homepage->description !!}
        </div>
    </div>


@endsection
