<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\{DB, Auth, File, Storage};
use App\Models\SiteSetting;
class SiteSettingController extends Controller
{
    public function editLogoFavicon() {
        $site_data = SiteSetting::find("1");
        return view("backend.admin.site_setting.editLogo&Favicon", compact("site_data"));
    }
    public function updateLogoFavicon(Request $request) {
         $validated = $request->validate([
            'site_name' => 'required',
        ]);
        $site_seting = SiteSetting::find("1");

        $site_seting->site_name = $request->site_name;
        $logo = $request->logo;
        $favicon = $request->favicon;

        if($logo) {
            $oldLogoPath = public_path($site_seting->logo); // full path

            if (File::exists($oldLogoPath)) {
                File::delete($oldLogoPath);
            }

            $logoName = 'logo'. uniqid() . '.' . $logo->getClientOriginalExtension();
            $resize_image = Image::make($logo);

            // logo insert for local system
            $logo_path = storage_path('app/public/uploads/logo/');
            $resize_image->save($logo_path . $logoName);

            // logo insert for database
             $site_seting->logo = "storage/uploads/logo/" . $logoName;
        }

        if($favicon) {
            $oldFaviconPath = public_path($site_seting->favicon); // full path

            if (File::exists($oldFaviconPath)) {
                File::delete($oldFaviconPath);
            }

            $faviconName = 'favicon'. uniqid() . '.' . $favicon->getClientOriginalExtension();
            $resize_favicon = Image::make($favicon)->resize(300, 300);

            // favicon insert for local system
            $favicon_path = storage_path('app/public/uploads/logo/');
            $resize_favicon->save($favicon_path . $faviconName);

            // favicon insert for database
             $site_seting->favicon = "storage/uploads/logo/" . $faviconName;

        }

        $site_seting->save();
        return redirect()->back()->with('success', 'Logo or Favicon Updated Successfully!');
    }
    public function editSocialMedia()  {
        $site_data = SiteSetting::find("1");
        return view("backend.admin.site_setting.editSocialMedia", compact("site_data"));
    }
    public function updateSocialMedia(Request $request) {
        $validated = $request->validate([
            'facebook' => 'required',
            'instagram' => 'required',
            'twitter' => 'required',
            'linkedin' => 'required',
        ]);

        $site = SiteSetting::find("1");
        $site->facebook = $request->facebook;
        $site->instagram = $request->instagram;
        $site->twitter = $request->twitter;
        $site->linkedin = $request->linkedin;
        $site->save();
        return redirect()->back()->with('success', 'Social Media Updated Successfully!');
    }
    public function editCopyright() {
        $site = SiteSetting::find("1");
        return view("backend.admin.site_setting.editCopyright", compact("site"));
    }
    public function updateCopyright(Request $request) {
        $validated = $request->validate([
            'copyright' => 'required'
        ]);
        $site = SiteSetting::find("1");
        $site->copyright = $request->copyright;
        $site->save();
        return redirect()->back()->with('success', 'Copyright Updated Successfully!');
    }
}
