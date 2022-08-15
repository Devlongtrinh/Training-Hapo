<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reply;

class ReplyController extends Controller
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
            'user_id' => auth()->user()->id,
            'review_id' => $request['review_id'],
            'reply' => $request['reply'],
        ];
        Reply::create($data);
        return redirect()->route('courses.show', [$request['course_id']]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $reply = Reply::find($id);
        if ($reply->canUpdateReply($request)) {
            $reply['reply'] = $request['review'];
            $reply->save();
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
        Reply::find($id)->forceDelete();
        return redirect()->route('courses.index');
    }
}
