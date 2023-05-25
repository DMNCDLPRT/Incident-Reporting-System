<aside id="sidebar" class="fixed hidden z-20 h-full top-0 left-0 lg:flex flex-shrink-0 flex-col w-64 transition-width duration-75" aria-label="Sidebar">
    <div class="relative flex-1 flex flex-col min-h-0 border-r border-gray-200 bg-white pt-0">
       <div class="flex-1 flex flex-col overflow-y-auto">
          <div class="flex-1 px-3 bg-white divide-y space-y-1 pt-3">
            <a href="{{ route('dashboard') }}">
               <div class="shrink-0 flex items-center py-[2.5px]">
                   <x-jet-application-mark class="block h-9 w-auto" />
                   <div class="flex items-center">
                      <h1 class="text-[28px] font-black tracking-wide antialiased hover:subpixel-antialiased pl-2">UIRS</h1>
                      <h6 class="text-[10px] pl-1">Ubiquitous Incident Reporting System </h4>
                   </div>
               </div>
            </a>
             <ul class="space-y-2 pb-2">
                <li>
                   <form action="#" method="GET" class="lg:hidden">
                      <label for="mobile-search" class="sr-only">Search</label>
                      <div class="relative">
                         <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                               <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                            </svg>
                         </div>
                         <input type="text" name="email" id="mobile-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-600 block w-full pl-10 p-2.5" placeholder="Search">
                      </div>
                   </form>
                </li>
                <li>
                   <a href="{{ route('dashboard') }}"  class="text-base text-gray-900 font-normal rounded-lg flex items-center p-2 hover:bg-gray-100 group">
                      <svg class="w-6 h-6 text-gray-600 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                         <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                         <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                      </svg>
                      <span class="ml-3">Home</span>
                   </a>
               </li>
               <li>
                  <a href="{{ route('portal') }}"  class="text-base text-gray-900 font-normal rounded-lg flex items-center p-2 hover:bg-gray-100 group">
                     <svg class="w-6 h-6 text-gray-600 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-2 0c0 .993-.241 1.929-.668 2.754l-1.524-1.525a3.997 3.997 0 00.078-2.183l1.562-1.562C15.802 8.249 16 9.1 16 10zm-5.165 3.913l1.58 1.58A5.98 5.98 0 0110 16a5.976 5.976 0 01-2.516-.552l1.562-1.562a4.006 4.006 0 001.789.027zm-4.677-2.796a4.002 4.002 0 01-.041-2.08l-.08.08-1.53-1.533A5.98 5.98 0 004 10c0 .954.223 1.856.619 2.657l1.54-1.54zm1.088-6.45A5.974 5.974 0 0110 4c.954 0 1.856.223 2.657.619l-1.54 1.54a4.002 4.002 0 00-2.346.033L7.246 4.668zM12 10a2 2 0 11-4 0 2 2 0 014 0z" clip-rule="evenodd"></path>
                     </svg>
                     <span class="ml-3">Report Emergency</span>
                  </a>
               </li>
               <li>
                  <a href="{{ route('adminDashboard') }}"  class="text-base text-gray-900 font-normal rounded-lg flex items-center p-2 hover:bg-gray-100 group">
                     <svg class="w-6 h-6 text-gray-600 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path>
                     </svg>
                     <span class="ml-3">Dashboard</span>
                  </a>
                  <div class="pl-5">
                     <a href="{{ route('adminDashboard') }}#Main" class="text-base text-gray-600 font-normal rounded-lg hover:bg-gray-200 group transition duration-75 flex items-center p-2">
                        <span class="ml-3 text-[14px]">Main
                        </span>
                     </a>
                     <a href="{{ route('adminDashboard') }}#Graphs" class="text-base text-gray-600 font-normal rounded-lg hover:bg-gray-200 group transition duration-75 flex items-center p-2">
                        <span class="ml-3 text-[14px]">Graphs
                        </span>
                     </a>
                  </div>
               </li>
             </ul>
             <div class="space-y-2 pt-2">
                <a href="{{ route('users') }}" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 group transition duration-75 flex items-center p-2">
                   <svg class="w-6 h-6 text-gray-600 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                      <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path>
                   </svg>
                   <span class="ml-3">Users</span>
                </a>
                @role('Admin')
                  <a href="{{ route('admin') }}" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 group transition duration-75 flex items-center p-2">
                     <svg class="w-6 h-6 text-gray-600 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-2 0c0 .993-.241 1.929-.668 2.754l-1.524-1.525a3.997 3.997 0 00.078-2.183l1.562-1.562C15.802 8.249 16 9.1 16 10zm-5.165 3.913l1.58 1.58A5.98 5.98 0 0110 16a5.976 5.976 0 01-2.516-.552l1.562-1.562a4.006 4.006 0 001.789.027zm-4.677-2.796a4.002 4.002 0 01-.041-2.08l-.08.08-1.53-1.533A5.98 5.98 0 004 10c0 .954.223 1.856.619 2.657l1.54-1.54zm1.088-6.45A5.974 5.974 0 0110 4c.954 0 1.856.223 2.657.619l-1.54 1.54a4.002 4.002 0 00-2.346.033L7.246 4.668zM12 10a2 2 0 11-4 0 2 2 0 014 0z" clip-rule="evenodd"></path>
                     </svg>
                     <span class="ml-3">Settings</span>
                  </a>
                  <div class="pl-5">
                     <a href="{{ route('admin') }}#numbers-department" class="text-base text-gray-600 font-normal rounded-lg hover:bg-gray-200 group transition duration-75 flex items-center p-2">
                        <span class="ml-3 text-[14px]">Add Contact Number
                        </span>
                     </a>
                     <a href="{{ route('admin') }}#Assigned-Contact-Numbers" class="text-base text-gray-600 font-normal rounded-lg hover:bg-gray-200 group transition duration-75 flex items-center p-2">
                        
                        <span class="ml-3 text-[14px]">Assigned Contact Number</span>
                     </a>
                     <a href="{{ route('admin') }}#Add-Emergency-Departments" class="text-base text-gray-600 font-normal rounded-lg hover:bg-gray-200 group transition duration-75 flex items-center p-2">
                        
                        <span class="ml-3 text-[14px]">Add Emergency Department</span>
                     </a>
                     <a href="{{ route('admin') }}#Add-incident" class="text-base text-gray-600 font-normal rounded-lg hover:bg-gray-200 group transition duration-75 flex items-center p-2">
                        
                        <span class="ml-3 text-[14px]">Add Incident</span>
                     </a>
                     <a href="{{ route('admin') }}#Assign-Department" class="text-base text-gray-600 font-normal rounded-lg hover:bg-gray-200 group transition duration-75 flex items-center p-2">
                        
                        <span class="ml-3 text-[14px]">Assign Department</span>
                     </a>
                     
                  </div>
                  <a href="{{ route('view.textLog') }}" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 group transition duration-75 flex items-center p-2">
                     <svg class="w-6 h-6 text-gray-600 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-2 0c0 .993-.241 1.929-.668 2.754l-1.524-1.525a3.997 3.997 0 00.078-2.183l1.562-1.562C15.802 8.249 16 9.1 16 10zm-5.165 3.913l1.58 1.58A5.98 5.98 0 0110 16a5.976 5.976 0 01-2.516-.552l1.562-1.562a4.006 4.006 0 001.789.027zm-4.677-2.796a4.002 4.002 0 01-.041-2.08l-.08.08-1.53-1.533A5.98 5.98 0 004 10c0 .954.223 1.856.619 2.657l1.54-1.54zm1.088-6.45A5.974 5.974 0 0110 4c.954 0 1.856.223 2.657.619l-1.54 1.54a4.002 4.002 0 00-2.346.033L7.246 4.668zM12 10a2 2 0 11-4 0 2 2 0 014 0z" clip-rule="evenodd"></path>
                     </svg>
                     <span class="ml-3">Text Log</span>
                  </a>
                @endrole
             </div>
          </div>
       </div>
    </div>
 </aside>
 <div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>