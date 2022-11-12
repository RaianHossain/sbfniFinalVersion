<?php

namespace App\Http\Controllers;

use App\Models\GreetingMessage;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Http\Request;

class GreetingMessageController extends Controller
{
    public function index()
    {

        $greetingMessage = GreetingMessage::latest();

        if (request('search')) {
            $greetingMessage = $greetingMessage
                ->where('greeting_messages', 'like', '%' . request('search') . '%')
                ->orWhere('message_by', 'like', '%' . request('search') . '%');
        }

        $greetingmessages = $greetingMessage->paginate(10);

        return view('backend.greetingmessages.index', [
            'greetingmessages' => $greetingmessages
        ]);
    }

    public function create()
    {
        // $this->authorize('create-greetingmessages');

        return view('backend.greetingmessages.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'greeting_messages' => 'required',
            'message_by' => 'required',
            'name' => 'required',
        ]);
        try {
            GreetingMessage::create([
                'message_by' => $request->message_by,
                'img' => $this->uploadimg(request()->file('img')),
                'greeting_messages' => $request->greeting_messages,
                'name' => $request->name,
            ]);

            return redirect()->route('greetingmessages.index')->withMessage('Successfully Created!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function show(GreetingMessage $greetingmessage)
    {
        return view('backend.greetingmessages.show', [
            'greetingmessage' => $greetingmessage
        ]);
    }

    public function edit(GreetingMessage $greetingmessage)
    {
        // $this->authorize('update-greetingmessages', $greetingmessage);

        return view('backend.greetingmessages.edit', [
            'greetingmessage' => $greetingmessage
        ]);
    }

    public function update(Request $request, GreetingMessage $greetingmessage)
    {
        // dd($request->all());
        $greetingmessage = GreetingMessage::findOrFail($greetingmessage->id);
        try {
            $requestData = [
                'message_by' => $request->message_by,
                'greeting_messages' => $request->greeting_messages,
                'name' => $request->name,
            ];

            if ($request->hasFile('img')) {
                $requestData['img'] = $this->uploadimg(request()->file('img'));
            } else {
                $requestData['img'] = $greetingmessage->img;
            }

            $greetingmessage->update($requestData);

            return redirect()->route('greetingmessages.index')->withMessage('Successfully Updated!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function destroy(GreetingMessage $greetingmessages)
    {
        try {
            $greetingmessages->delete();
            unlink(public_path('storage/greeting/' . $greetingmessages->img));
            return redirect()->route('greetingmessages.index')->withMessage('Successfully Deleted!');
        } catch (QueryException $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    // Softdelete
    // public function trash()
    // {
    //     $greetingmessages = GreetingMessage::onlyTrashed()->get();

    //     return view('backend.greetingmessages.trashed', [
    //         'greetingmessages' => $greetingmessages
    //     ]);
    // }

    // public function restore($id)
    // {
    //     $greetingmessages = GreetingMessage::onlyTrashed()->findOrFail($id);
    //     $greetingmessages->restore();
    //     return redirect()->route('greetingmessages.trashed')->withMessage('Successfully Restored!');
    // }

    public function delete($id)
    {
        $greetingmessages = GreetingMessage::findOrFail($id);
        unlink(public_path('storage/greeting/' . $greetingmessages->img));
        $greetingmessages->forceDelete();
        return redirect()->route('greetingmessages.index')->withMessage('Successfully Deleted Permanently!');
    }

    public function uploadimg($file)
    {
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $destinationPath = storage_path('/app/public/greeting/');
        $file->move($destinationPath, $fileName);
        return $fileName;
    }
}
