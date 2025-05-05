<?php

namespace App\Http\Controllers;

use App\helpers\ImageHelper;
use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ConfigController extends Controller
{
    public function storeOrUpdate(Request $request)
    {
        // $validated = $request->validate([
        //     'site_name' => 'required|string|max:255',
        //     'site_email' => 'required|email',
        //     'link_in' => 'nullable|url',
        //     'link_git' => 'nullable|url',
        //     'site_keyword' => 'nullable|string',
        //     'description' => 'nullable|string',
        //     'google_tags' => 'nullable|string',
        //     'google_analytics' => 'nullable|string',
        //     'meta_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        // ]);
        try {
            DB::beginTransaction();
            // Check if the meta_image is present and valid
            if ($request->hasFile('meta_image')) {
                $old_image = Config::where('key', 'meta_image')->first();
                $imagePath=ImageHelper::update('images/meta', $old_image, $request->file('meta_image'));
            }

            $settings = [
                'site_name' => $request->site_name,
                'site_email' => $request->site_email,
                'link_in' => $request->link_in,
                'link_git' => $request->link_git,
                'site_keyword' => $request->site_keyword,
                'description' => $request->description,
                'google_tags' => $request->google_tags,
                'google_analytics' => $request->google_analytics,
                'meta_image' => isset($imagePath) ? $imagePath : null,
            ];
            foreach ($settings as $key => $value) {
                Config::updateOrCreate(['key' => $key], ['value' => $value]);
            }
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Settings updated successfully.']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Image upload failed.'], 422);
        }
    }
    public function getSettings()
    {
        $settings = Config::all();
        return response()->json(['settings' => $settings]);
    }
}
