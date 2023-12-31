<!DOCTYPE html>
<html>
<head>
<style>
table, td, th {
  border: 1px solid;
}

table {
  width: 100%;
  border-collapse: collapse;
}
</style>
</head>
<body>


                                            @if(empty($getNameFromWalkByPatient))

<p>{{ $getNameFromPatient }}</p>
                                            @else
                                            <p>{{ $getNameFromWalkByPatient }}</p>
                                            @endif
                                             @if(empty($getPhoneFromWalkByPatient))
                                            <p class="text-muted mb-1" id="address-details">{{ $getPhoneFromPatient }}</p>
                                            @else
                                            <p class="text-muted mb-1" id="address-details">{{ $getPhoneFromWalkByPatient }}</p>
                                            @endif

<h2>Medicine List</h2>

        <table class="table table-borderless text-center table-nowrap align-middle mb-0">
                                        <thead>
                                        <tr class="table-active">
<th>Sl No</th>
                                            <th scope="col">Hearb</th>

                                            <th scope="col">Cost</th>
                                            <th scope="col">Dose</th>
                                            <th scope="col" class="text-end">Amount</th>
                                             <th scope="col" class="text-end">Part Of the Day</th>
                                             <th scope="col" class="text-end">Time</th>
                                        </tr>
                                        </thead>
                                        <tbody id="products-list">

                                            <?php

                                        $countData = count($patientTherapyList);
                                        $countpatientHerb = count($patientHerb);
                                        $getPatientHerb =0;
                                        ?>
                                           @foreach($patientHerb as $key=>$allPatientHerbList)
                                           <?php
                                          $getPatientHerb = DB::table('medicines')->where('name',$allPatientHerbList->name)->value('amount');
$getPackage = DB::table('packages')->where('id',$allPatientHerbList->package_name)->value('name');
$getPatientHerb = DB::table('packages')->where('id',$allPatientHerbList->package_name)->value('amount');
?>
                                        <tr>
<td>{{$key+1}}</td>
                                            <td class="text-start">
                                                <span class="fw-medium">{{ $allPatientHerbList->name }}({{ $getPackage }})</span>

                                            </td>

                                            @if(($key+1) == $countpatientHerb)

                                            <td>BDT {{ $getPatientHerb }}</td>

                                            @else
<td></td>
                                            @endif
                                            <td>{{ $allPatientHerbList->how_many_dose }}</td>
                                            @if(($key+1) == $countpatientHerb)
                                            <td class="text-end">BDT {{ $getPatientHerb }}</td>


                                            @else
<td class="text-end"></td>
                                            @endif
                                            <td>{{$allPatientHerbList->part_of_the_day}}</td>
                                             <td>{{$allPatientHerbList->main_time}}</td>
                                        </tr>
                                        @endforeach




                                        </tbody>
                                    </table><!--end table-->
                                </div>
                                <div class="border-top border-top-dashed mt-2" style="margin-top:20px;">
                                    <table>
                                        <tbody>
                                        <tr>
                                            <td style="width:80%; text-align:right; padding-right:20px;">Total</td>
                                            <td style="width:20%; text-align:right">BDT {{ $totalMedicineAmount }}</td>
                                        </tr>

                                        </tbody>
                                    </table>
                                    <!--end table-->

</body>
</html>
