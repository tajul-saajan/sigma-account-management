<?php

namespace App\Http\Controllers;

use App\Models\ProjectOffer;
use Illuminate\Http\Request;

class ProjectOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index()
    {
        $projectOffers = ProjectOffer::all()->toArray();
        return array_reverse($projectOffers);
    }



    public function add(Request $request)
    {
        $projectOffer = new ProjectOffer([
            ProjectOffer::FIELD_PO => $request->input(ProjectOffer::FIELD_PO),
            ProjectOffer::FIELD_PROJECT_NAME => $request->input(ProjectOffer::FIELD_PROJECT_NAME),
            ProjectOffer::FIELD_CLIENT => $request->input(ProjectOffer::FIELD_CLIENT),
            ProjectOffer::FIELD_PO_DATE => $request->input(ProjectOffer::FIELD_PO_DATE),
            ProjectOffer::FIELD_OFFER_REFERENCE_NO => $request->input(ProjectOffer::FIELD_OFFER_REFERENCE_NO),
            ProjectOffer:: FIELD_OFFER_DATE=> $request->input(ProjectOffer::FIELD_OFFER_DATE),
            ProjectOffer:: FIELD_PO_STATUS=> $request->input(ProjectOffer::FIELD_PO_STATUS),
            ProjectOffer::FIELD_SUBMIT_TYPE => $request->input(ProjectOffer::FIELD_SUBMIT_TYPE),
        ]);

        $projectOffer->save();



        return response()->json('The Project Offer successfully added');
    }



    public function edit( $id)
    {
        $projectOffer = ProjectOffer::find($id);
        return response()->json($projectOffer);
    }


    public function update(Request $request, $id )
    {
        $projectOffer = ProjectOffer::find($id);
        $projectOffer->update($request->all());
        return response()->json('The Project Offer successfully updated');
    }


    public function delete($id)
    {
        $projectOffer = ProjectOffer::find($id);
        $projectOffer->delete();
         return response()->json('The Project Offer successfully deleted');
    }
}
