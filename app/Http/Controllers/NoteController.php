<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Http\Resources\NoteResource;
use App\Models\Note;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Symfony\Component\HttpFoundation\Response;

class NoteController extends Controller
{
    /**
     * Display a listing of the notes
     */
    public function index(): ResourceCollection
    {
        return NoteResource::collection(Note::all());
    }

    /**
     * Store a newly created notes in storage.
     */
    public function store(NoteRequest $request)
    {
        $result = Note::create($request->validated());

        return new NoteResource($result);
    }

    /**
     * Display the specified note.
     */
    public function show(int $id): NoteResource
    {
        return new NoteResource(Note::find($id));
    }

    /**
     * Update the specified note in storage.
     */
    public function update(NoteRequest $request, int $id): NoteResource
    {
        $validated = $request->validated();

        $note = Note::findOrFail($id);

        $note->update($validated);

        return new NoteResource($note);
    }

    /**
     * Remove the specified note from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        $var = Note::findOrFail($id)->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
