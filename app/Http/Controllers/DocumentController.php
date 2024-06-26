<?php

namespace App\Http\Controllers;

use App\Document;
use App\DocumentConfiguration;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function getDocuments()
    {
        $documents = Document::all();

        $transformedDocuments = $documents->map(function ($document) {
            // Example logic to count fields or elements
            $fieldCount = count($document->toArray()); // Adjust this based on your actual field count logic
    
            return [
                'id' => $document->id,
                'document_name' => str_replace("Jauns dokuments", "New document", $document->document_name),
                'created_at' => '2022-01-12T13:11:59.000000Z', // Adjust as needed
                'field_count' => $fieldCount
            ];
        });
    
        return response()->json($transformedDocuments);
    }

    public function getDocument($id)
    {
        $document = Document::with('configurations')->find($id);
        return response()->json($document);
    }

    public function createDocument(Request $request)
    {
        $data = $request->validate([
            'document_name' => 'required|string',
            'form_values' => 'required|array'
        ]);

        $document = Document::create(['document_name' => $data['document_name']]);
        foreach ($data['form_values'] as $field) {
            DocumentConfiguration::create([
                'document_id' => $document->id,
                'field_seq' => $field['field_seq'],
                'is_mandatory' => $field['is_mandatory'],
                'field_type' => $field['field_type'],
                'field_name' => $field['field_name'],
                'select_values' => json_encode($field['select_values'])
            ]);
        }

        return response()->json($document);
    }
}
