<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;
use App\Models\Review;

class ReviewController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'course_id' => $request['course_id'],
            'user_id' => auth()->user()->id,
            'rate' => $request['rate'],
            'review' => $request['review'],
        ];
        Review::create($data);
        return redirect()->route('courses.show', [$request['course_id']]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReviewRequest $request, $id)
    {
        $review = Review::find($id);
        if ($review->canUpdateReview($request)) {
            $review['review'] = $request('review');
            $review->save();
        }
        return redirect()->route('courses.show', [$request['course_id']]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Review::find($id)->forceDelete();
        return redirect()->route('courses.index');
    }
}
