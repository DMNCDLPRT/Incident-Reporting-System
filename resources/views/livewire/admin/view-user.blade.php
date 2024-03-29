<div class="bg-gray-200 font-sans flex-row justify-center items-center">
    <div class="pt-12 mx-auto bg-white  shadow-xl hover:shadow">
       {{-- <img class=" mx-auto rounded-full -mt-20 border-8 border-white" src="https://avatars.githubusercontent.com/u/67946056?v=4" alt=""> --}}
       <img src="{{ $user[0]->profile_photo_url }}" alt="{{ $user[0]->name }}" class="mx-auto rounded-full h-20 w-20 object-cover">
       <div class="text-center mt-2 text-3xl font-medium">{{ $user[0]->name }}</div>
       <div class="text-center mt-2 font-light text-sm">{{ $user[0]->email }}</div>
       
       <hr class="mt-8">
       <div class="flex p-4">
         <div class="w-1/2 text-center">
           <span class="font-bold">{{ $count->count() }}</span> Reports
         </div>
         <div class="w-0 border border-gray-300">
         </div>
         <div class="w-1/2 text-center">
          
           <span class="font-bold">{{ $user[0]->getRoleNames() }}</span> User Role
         </div>
       </div>
    </div>
</div>