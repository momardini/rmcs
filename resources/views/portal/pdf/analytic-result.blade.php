<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" >

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        @page {
            header: page-header;
            footer: page-footer;
            margin-top: 0.5cm;
            margin-bottom: 0.5cm;
            margin-left: 0.5cm;
            margin-right: 0.5cm;

        }

        /* body {*/
        /*    font-family: 'droidfont', sans-serif;*/
        /*    font-size: 12px;*/
        /*    font-weight: 300;*/
        /*    border: 5px solid black;*/
        /*}*/
        #page-border {
            width: 100%;
            height: 100%;
            border: 4px double black;
        }

        .borderdtable,
        .borderdtable th,
        .borderdtable td {
            border: 1px solid #b4b4b4;
            border-collapse: collapse;
            text-align: center;
            padding-top: 5px;
            padding-bottom: 5px;
        }
        .noborderdtable,
        .noborderdtable th,
        .noborderdtable td {
            padding-top: 5px;
            padding-bottom: 5px;

        }
    </style>
    <style>
        /*@font-face {*/
        /*    font-family: 'cairoregular';*/
        /*    src: url("/storage/resource/cairo-regular-webfont.woff2") format('woff2'),*/
        /*    url('/storage/resource/cairo-regular-webfont.woff') format('woff');*/
        /*    font-weight: normal;*/
        /*    font-style: normal;*/

        /*}*/

        body {
            /*font-family: 'xbriyaz';*/
            font-family: 'XBRiyaz';
            font-size: 0.9rem;
            font-weight: 300;
            height: 100%;
            width: 100%;
            margin: 0;
            padding: 0;
        }

        /* body{font-family: 'cairoregular';} */
    </style>
</head>

<body>
<div id="page-border">
    <htmlpageheader name="page-header">

    </htmlpageheader>

    <htmlpagefooter name="page-footer">
        <hr style="border-width:0;color:#e6e6e6;background-color:#e6e6e6">
        <p style="text-align: center;padding: 0px;margin: 0px;font-size: small">{{$station->getTranslatedAttribute('title')}} -  <span>{{date('d.m.Y')}}</span></p>
    </htmlpagefooter>
    <table style="width: 100%;" class="noborderdtable">
        <tbody>
        <tr>
            <td style="text-align: left;"><img src="{{ url('storage/'.$station->logo) }}" width="20%" /></td>
            <td></td>
            <td style="text-align: right;font-family: 'cairoregular';">
                <h3 style="color: #2e416a;">{{$station->getTranslatedAttribute('title')}}</h3>
                <strong>{{ __('portal.patient.clinic') }} : <span style="color: #9f3629;">{{$appointment->clinic->getTranslatedAttribute('title')}}</span></strong>
                <p style="text-align: right;" >{{ __('portal.patient.interview-number') }} : {{$appointment->id}}</p>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="text-align: center;">
                <h2><strong>{{ __('portal.patient.analysis-results') }}</strong></h2>
            </td>
        </tr>
        <tr>

            <td style="width: 25%;text-align: right;direction: rtl;" > {{ __('portal.patient.age') }} : <span style="color: #9f3629;">{{$patient->age}}</span></td>
            <td style="width: 25%;text-align: right;">{{ __('portal.patient.patient-number') }} : <span style="color: #9f3629;">{{$patient->id}}</span></td>
            <td style="width: 50%;text-align: right;">{{ __('portal.patient.patient-name') }} : <span style="color: #9f3629;">{{$patient->full_name}}</span></td>
        </tr>
        </tbody>
    </table>
    <br>
    <table style="width: 90%; margin-left: auto; margin-right: auto;" class="borderdtable">
        <thead>
        <tr>

            <th>{{ __('portal.patient.analytics') }}</th>
            <th>{{ __('portal.patient.analytic') }}</th>
            <th>{{ __('portal.patient.normal-unit') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($interview->analytics as $analytic)
            @if ($analytic->pivot->result)
                @if ($analytic->normal_max && ($analytic->pivot->result > $analytic->normal_max || $analytic->pivot->result < $analytic->normal_min) )
                    <tr style="background: #e6e6e6;">

                        <td>
                            {{$analytic->title}}
                        </td>
                        <td style="text-align: left">
                            @php
                                $lines = preg_split('/[~]/', $analytic->pivot->result);
                            @endphp
                            @if (count($lines) > 2)
                                @php
                                    foreach ($lines as $line ) {
                                        if ($line) {
                                            $value = substr($line, strpos($line, ":") + 1);
                                            $len = strlen($value);
                                            if ($len > 2) {
                                                echo "<strong>".$line."</strong><br />";
                                            }else{
                                                echo "<p>".$line."</p>";
                                            }
                                        }
                                    }
                                @endphp
                            @else
                                {!! nl2br(e($analytic->pivot->result)) !!}
                            @endif
                        </td>
                        <td>
                            {{$analytic->normal_min}} - {{$analytic->normal_max}} / {{$analytic->unit}}
                        </td>
                    </tr>
                @else
                    <tr>

                        <td >
                            {{$analytic->title}}
                        </td>
                        <td style="text-align: left">
                            @php
                                $lines = preg_split('/[~]/', $analytic->pivot->result);
                            @endphp
                            @if (count($lines) > 2)
                                @php
                                    foreach ($lines as $line ) {
                                        if ($line) {
                                            $value = substr($line, strpos($line, ":") + 1);
                                            $len = strlen($value);
                                            if ($len > 2) {
                                                echo "<strong>".$line."</strong><br />";
                                            }else{
                                                echo "<p>".$line."</p>";
                                            }
                                        }
                                    }
                                @endphp
                            @else
                                {!! nl2br(e($analytic->pivot->result)) !!}
                            @endif
                        </td>
                        <td></td>
                    </tr>
                @endif
            @endif
        @endforeach
        </tbody>
    </table>
</div>
</body>

</html>
