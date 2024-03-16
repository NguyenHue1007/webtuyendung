<?php

namespace App\Http\Controllers\JobSeeker;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWordToHtml\Converter;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

class JobApplyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $applications = $user->applications;
        return view('jobseeker.job-apply', compact('user', 'applications'));
    }

    public function viewCV(Application $application)
    {
        // $cvContent = Storage::get($application->resume); // Lấy nội dung của tệp tin CV từ storage

        // // Tạo một đối tượng PhpWord và sử dụng IOFactory để load tệp tin Word
        // $phpWord = new PhpWord();
        // $phpWord = IOFactory::load($cvContent);

        // // Lấy nội dung từ PhpWord và chuyển đổi thành HTML
        // $htmlContent = '';
        // foreach ($phpWord->getSections() as $section) {
        //     foreach ($section->getElements() as $element) {
        //         $htmlContent .= $element->getHtml();
        //     }
        // }
        return view('preview');
    }
}
