<?php
    // add this function into your laravel class 
    public function save(Request $request) {

        $month = date('m');

        if($request->hasfile('imageFile')) {
            
            $request->validate([
                'imageFile' => 'nullable',
                'imageFile.*' => 'mimes:jpeg,jpg,png,gif|max:2048'
            ]);
        
            foreach($request->imageFile as $file)
            {
                $name = time() . $file->getClientOriginalName();
                $file->move(public_path('uploads/' . $month . '/'), $name);
                $imgData[] = $name;  
            }
    
            // return "succsess";
            // return back()->with('success', 'File has successfully uploaded!');

        }
    }

// submit the image from form with name as array imageFile[]
