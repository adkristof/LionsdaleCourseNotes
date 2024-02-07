<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Quiz;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Quiz::create([
            'question'=>'What does "www" stands for?',
            'answere' =>'World Wide Web',
            'fakeanswereone'=>'Wide Working Web',
            'fakeansweretwo'=>'When Where Why',
            'type_id'=>'1',
        ]);
        Quiz::create([
            'question'=>'What does CSS stand for?',
            'answere' =>'Cascading Style Sheets',
            'fakeanswereone'=>'Computer Style Sheets',
            'fakeansweretwo'=>'Creative Style Scripts',
            'type_id'=>'1',
        ]);
        Quiz::create([
            'question'=>'What is the purpose of HTML?',
            'answere' =>'Hypertext Markup Language',
            'fakeanswereone'=>' Hyper Text Manipulation Languageb',
            'fakeansweretwo'=>'Hyperlink Text Markup',
            'type_id'=>'1',
        ]);
        Quiz::create([
            'question'=>'What role does JavaScript play in web development?',
            'answere' =>'JavaScript adds interactivity and dynamic behavior to web pages.',
            'fakeanswereone'=>'JavaScript solely focuses on styling.',
            'fakeansweretwo'=>'JavaScript is used for server-side scripting only.',
            'type_id'=>'1',
        ]);
        Quiz::create([
            'question'=>'What is the purpose of responsive web design?',
            'answere' =>'To ensure web pages adapt to various screen sizes and devices.',
            'fakeanswereone'=>'To make websites load faster.',
            'fakeansweretwo'=>'To restrict access to certain users.',
            'type_id'=>'1',
        ]);
        Quiz::create([
            'question'=>'What is the purpose of a GUI in desktop app development?',
            'answere' =>' To provide users with a visual interface for interacting with the application.',
            'fakeanswereone'=>'To optimize backend performance.',
            'fakeansweretwo'=>'To automate testing processes.',
            'type_id'=>'2',
        ]);
        Quiz::create([
            'question'=>'Which programming language is commonly used for developing desktop applications on the Windows platform?',
            'answere' =>' C# (C Sharp)',
            'fakeanswereone'=>'HTML',
            'fakeansweretwo'=>'Python',
            'type_id'=>'2',
        ]);
        Quiz::create([
            'question'=>'What is the role of an IDE in desktop app development?',
            'answere' =>'An Integrated Development Environment (IDE) provides tools for coding, debugging, and deploying desktop applications.',
            'fakeanswereone'=>'IDEs are used for graphic design only.',
            'fakeansweretwo'=>'IDEs handle user authentication.',
            'type_id'=>'2',
        ]);
        Quiz::create([
            'question'=>'What is the purpose of serialization in desktop app development?',
            'answere' =>'Serialization is used to convert complex data structures into a format that can be easily stored or transmitted.',
            'fakeanswereone'=>'Serialization enhances user interface design.',
            'fakeansweretwo'=>'Serialization improves database security.',
            'type_id'=>'2',
        ]);
        Quiz::create([
            'question'=>'What is a DLL in the context of desktop app development?',
            'answere' =>'A Dynamic Link Library (DLL) is a file containing code and data that can be used by multiple programs at the same time.',
            'fakeanswereone'=>'DLL stands for Direct Linking Language.',
            'fakeansweretwo'=>'DLLs are used exclusively for graphics rendering.',
            'type_id'=>'2',
        ]);
        Quiz::create([
            'question'=>'What is the purpose of a mobile SDK in app development?',
            'answere' =>'A mobile SDK (Software Development Kit) provides tools, libraries, and documentation to help developers build applications for a specific mobile platform.',
            'fakeanswereone'=>'Mobile SDKs are used for social media integration only.',
            'fakeansweretwo'=>'Mobile SDKs primarily focus on hardware optimization.',
            'type_id'=>'3',
        ]);
        Quiz::create([
            'question'=>'Which programming language is commonly used for developing Android apps?',
            'answere' =>'Java (Kotlin is also gaining popularity)',
            'fakeanswereone'=>'HTML',
            'fakeansweretwo'=>'Swift',
            'type_id'=>'3',
        ]);
        Quiz::create([
            'question'=>'What is the purpose of an APK file in Android app development?',
            'answere' =>'An APK (Android Package Kit) file contains all the elements necessary to install and run an Android application on a device.',
            'fakeanswereone'=>'APK files are used for storing audio files.',
            'fakeansweretwo'=>'APK files are primarily used for cloud storage.',
            'type_id'=>'3',
        ]);
        Quiz::create([
            'question'=>'What is the purpose of Interface Builder in iOS app development?',
            'answere' =>'Interface Builder is a visual design tool used to create user interfaces for iOS applications.',
            'fakeanswereone'=>'Interface Builder generates backend code automatically.',
            'fakeansweretwo'=>'Interface Builder focuses solely on database management.',
            'type_id'=>'3',
        ]);
        Quiz::create([
            'question'=>'What is the role of CocoaTouch in iOS app development?',
            'answere' =>'CocoaTouch is a framework that provides essential building blocks for iOS app development, including UI components, multitasking support, and touch event handling.',
            'fakeanswereone'=>'CocoaTouch is used exclusively for data encryption.',
            'fakeansweretwo'=>'CocoaTouch is primarily used for server-side scripting.',
            'type_id'=>'3',
        ]);
    }
}
