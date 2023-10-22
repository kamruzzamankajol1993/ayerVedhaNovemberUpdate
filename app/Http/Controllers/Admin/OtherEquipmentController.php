<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TherapyIngredient;
use Illuminate\Support\Facades\Auth;
use App\Models\MedicineEquipment;
use App\Models\PatientHerbDetail;
use App\Models\PatientTherapyDetail;
use App\Models\InventoryCategory;
use App\Models\OtherIngredient;
use App\Models\InventoryName;

use App\Models\OtherEquipment;
use App\Models\OtherEquipmentDetail;
class OtherEquipmentController extends Controller
{
    public function create(){

        $inventoryNames = InventoryName::latest()->get();
        $medicineEquipments = MedicineEquipment::latest()->get();
        $therapyIngredients = TherapyIngredient::latest()->get();
        $inventoryCategorys = InventoryCategory::latest()->get();
        $otherIngredients = OtherIngredient::latest()->get();

        return view('admin.otherEquipment.create',compact('inventoryNames','otherIngredients','inventoryCategorys','therapyIngredients','medicineEquipments'));
    }


    public function index(){

        $inventoryNames = InventoryName::latest()->get();
        $medicineEquipments = MedicineEquipment::latest()->get();
        $therapyIngredients = TherapyIngredient::latest()->get();
        $inventoryCategorys = InventoryCategory::latest()->get();
        $otherIngredients = OtherIngredient::latest()->get();


        $otherEquipments = OtherEquipment::latest()->get();

        return view('admin.otherEquipment.index',compact('otherEquipments','inventoryNames','otherIngredients','inventoryCategorys','therapyIngredients','medicineEquipments'));
    }



    public function store(Request $request){

        dd($request->all());

        $formCategory = substr($request->category,-1);



        $finalResult = substr($request->category, 0, -2);

        dd($finalResult);

        //new code

        if($request->equipmentType == 'normal'){


            if($formCategory == 1){



                $getPreviousQuantity = TherapyIngredient::where('name',$request->category)->value('quantity');

                $finalResult =$getPreviousQuantity - $request->quantity;




                     $mainOtherEquipment = new OtherEquipment();
                     $mainOtherEquipment->name =$request->name();
                     $mainOtherEquipment->save();


                     $mainOtherEquipmentId = $mainOtherEquipment->id;


                     $otherInfoDetail = new OtherEquipmentDetail();
                     $otherInfoDetail->other_equipment_id = $mainOtherEquipmentId;
                     $otherInfoDetail->name = $request->category;
                     $otherInfoDetail->quantity =$request->quantity;
                     $otherInfoDetail->unit =$request->unit;
                     $otherInfoDetail->save();


                     TherapyIngredient::where('name',$request->category)
           ->update([
               'quantity' => $finalResult
            ]);


                  




            }elseif($formCategory == 2){



            }elseif($formCategory == 3){

            }





        }elseif($request->equipmentType == 'mixer'){





        }

        //end new code





    }
}
