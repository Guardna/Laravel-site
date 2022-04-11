<?php

namespace App\Http\Controllers;

use App\Models\CommentsModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    private $data = [];
    public function postComment(Request $request, $postId)
    {
        switch($request->akcija) {
            case 'post':
        if ($request->get("content")) {
            $commentsModel = new CommentsModel();
            $commentsModel->content = $request->get("content");
            $commentsModel->post_id = $postId;
            try {
                $commentsModel->save();
                return redirect()->back()->with('success', "Komentar uspesno dodat.");
            } catch (QueryException $e) {
                \Log::error("Greska pri dodavanju komentara " . $e->getMessage());
                return redirect()->back()->with('warning', "Doslo je do greske na serveru.");
            }

        }
        return redirect()->back()->with('warning', "Poruka ne sme biti prazna.");
        break;
    }

    }
    /*public function postKoment(Request $request)
    {
                    $commentsModel = new CommentsModel();
                    $commentsModel->content = $request->get('content');
                    $commentsModel->post_id = $request->get("postid");
                    $id=$request->get("postid");
                    try {
                        $commentsModel->save();
                        $this->data[] = $commentsModel->getPostComments($id)-;
                        return response()->json($this->data);
                    } catch (QueryException $e) {
                        \Log::error("Greska pri dodavanju komentara " . $e->getMessage());
                        return redirect()->back()->with('warning', "Doslo je do greske na serveru.");
                    }

    }*/

    public function editComment(Request $request, $commentId)
    {
        switch($request->akcija) {
            case 'edit':
        $commentModel = new CommentsModel();
        try {
            $commentModel->content = $request->get('content1');
            $commentModel->update($commentId);
            return redirect()->back()->with('success', "Komentar uspesno izmenjen.");
        } catch (\Exception $e) {
            \Log::error("Greska pri izmeni komentara " . $e->getMessage());
            return redirect()->back()->with('warning', "Doslo je do greske na serveru.");
        }
        break;
    }

    }

    public function deleteComment($commentId)
    {
        $commentModel = new CommentsModel();
        if ($commentModel->find($commentId)) {
            try {
                if ($commentModel->delete($commentId)) {
                    return redirect()->back()->with("success", "Comment successfully deleted.");
                } else {
                    \Log::critical("Korisnik bez dozvoljenih prava pokusao da obrise komentar.");
                    return redirect()->back()->with("warning", "An error has occurred, please try again later.");
                }
            } catch (QueryException $e) {
                \Log::error("Greska pri brisanju komentara  " . $e->getMessage());
                return redirect()->back()->with("warning", "An error has occurred, please try again later.");
            }
        }
        return redirect()->back();
    }

    public function show($commentId)
    {
        $commentModel = new CommentsModel();
        $this->data['comments'] = $commentModel->getPostComments($commentId);

		if(!empty($commentId)){
			$commentModel->id = $commentId;
			$this->data['comment'] = $commentModel->getPostComments($commentId);
        return view('components.comments', $this->data);

    }

                }
}
