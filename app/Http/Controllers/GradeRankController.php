<?php

namespace App\Http\Controllers;

use App\GradeRank;
use Illuminate\Http\Request;

class GradeRankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GradeRank  $gradeRank
     * @return \Illuminate\Http\Response
     */
    public function show(GradeRank $gradeRank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GradeRank  $gradeRank
     * @return \Illuminate\Http\Response
     */
    public function edit(GradeRank $gradeRank)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GradeRank  $gradeRank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GradeRank $gradeRank)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GradeRank  $gradeRank
     * @return \Illuminate\Http\Response
     */
    public function destroy(GradeRank $gradeRank)
    {
        //
    }


    public static function firstInsertion()
    {
        $grade_ranks = array(
            [
                'grade_en' => 'A+', 'grade_ar' => 'أ+',
                'max_value_if_4' => 4, 'min_value_if_4' => 3.76,
                'max_value_if_5' => 5, 'min_value_if_5' => 4.76,
                'max_value_if_100' => 100, 'min_value_if_100' => 95,
                'grade_name_en' => 'Exceptional', 'grade_name_ar' => 'ممتاز مرتفع',
            ],
            [
                'grade_en' => 'A', 'grade_ar' => 'أ',
                'max_value_if_4' => 3.75, 'min_value_if_4' => 3.51,
                'max_value_if_5' => 4.75, 'min_value_if_5' => 4.51,
                'max_value_if_100' => 94, 'min_value_if_100' => 90,
                'grade_name_en' => 'Excellent', 'grade_name_ar' => 'ممتاز',
            ],
            [
                'grade_en' => 'B+', 'grade_ar' => 'ب+',
                'max_value_if_4' => 3.50, 'min_value_if_4' => 3.01,
                'max_value_if_5' => 4.50, 'min_value_if_5' => 4.01,
                'max_value_if_100' => 89, 'min_value_if_100' => 85,
                'grade_name_en' => 'Superior', 'grade_name_ar' => 'جيد جداً مرتفع',
            ],
            [
                'grade_en' => 'B', 'grade_ar' => 'ب',
                'max_value_if_4' => 3.00, 'min_value_if_4' => 2.51,
                'max_value_if_5' => 4.00, 'min_value_if_5' => 3.51,
                'max_value_if_100' => 84, 'min_value_if_100' => 80,
                'grade_name_en' => 'Very good', 'grade_name_ar' => 'جيد جداً',
            ],
            [
                'grade_en' => 'C+', 'grade_ar' => 'ج+',
                'max_value_if_4' => 2.50, 'min_value_if_4' => 2.01,
                'max_value_if_5' => 3.50, 'min_value_if_5' => 3.01,
                'max_value_if_100' => 79, 'min_value_if_100' => 75,
                'grade_name_en' => 'Above Average', 'grade_name_ar' => 'جيد مرتفع',
            ],
            [
                'grade_en' => 'C', 'grade_ar' => 'ج',
                'max_value_if_4' => 2.00, 'min_value_if_4' => 1.51,
                'max_value_if_5' => 3.00, 'min_value_if_5' => 2.51,
                'max_value_if_100' => 74, 'min_value_if_100' => 70,
                'grade_name_en' => 'Good', 'grade_name_ar' => 'جيد',
            ],
            [
                'grade_en' => 'D+', 'grade_ar' => 'د+',
                'max_value_if_4' => 1.50, 'min_value_if_4' => 1.01,
                'max_value_if_5' => 2.50, 'min_value_if_5' => 2.01,
                'max_value_if_100' => 69, 'min_value_if_100' => 65,
                'grade_name_en' => 'High Pass', 'grade_name_ar' => 'مقبول مرتفع',
            ],
            [
                'grade_en' => 'D', 'grade_ar' => 'د',
                'max_value_if_4' => 1.00, 'min_value_if_4' => 0.01,
                'max_value_if_5' => 2.00, 'min_value_if_5' => 1.01,
                'max_value_if_100' => 64, 'min_value_if_100' => 60,
                'grade_name_en' => 'Pass', 'grade_name_ar' => 'مقبول',
            ],
            [
                'grade_en' => 'F', 'grade_ar' => 'د',
                'max_value_if_4' => 0.00, 'min_value_if_4' => 0.00,
                'max_value_if_5' => 1.00, 'min_value_if_5' => 0.00,
                'max_value_if_100' => 59, 'min_value_if_100' => 0,
                'grade_name_en' => 'Fail', 'grade_name_ar' => 'راسب',
            ],
            [
                'grade_en' => 'Excellent', 'grade_ar' => 'ممتاز‎',
                'max_value_if_100' => 100, 'min_value_if_100' => 90,
            ],
            [
                'grade_en' => 'Very good', 'grade_ar' => 'جيد جداً',
                'max_value_if_100' => 89, 'min_value_if_100' => 80,
            ],
            [
                'grade_en' => 'Good', 'grade_ar' => 'جيد',
                'max_value_if_100' => 79, 'min_value_if_100' => 70,
            ],
            [
                'grade_en' => 'Acceptable', 'grade_ar' => 'مقبول‎',
                'max_value_if_100' => 69, 'min_value_if_100' => 60,
            ],
            [
                'grade_en' => 'Failure', 'grade_ar' => 'راسب‎',
                'max_value_if_100' => 59, 'min_value_if_100' => 0,
            ],

        );
        /*******************************************************************************************************/
        if (GradeRank::all()->count() >= count($grade_ranks)) {
            return false;
        }
        // -------------------------------------
        foreach ($grade_ranks as $grade_rank) {
            $grade_rank =  array_merge($grade_rank, [
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ]);
            $new_grade_rank = new GradeRank();
            $new_grade_rank->create($grade_rank);
        }
        return true;
    }
}
