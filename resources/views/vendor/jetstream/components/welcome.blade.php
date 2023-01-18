<!-- component -->
<div class="antialiased w-full h-full  font-inter p-10">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="container px-4 mx-auto">
            <div>
            <div id="title" class="text-center my-10">
                <h1 class="font-bold text-4xl">Incident Reporting System</h1>
                <p class="text-light text-gray-500 text-xl">
                    Don Carlos Bukidnon
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 justify-evenly gap-10 pt-10">
                <div id="plan" class="rounded-lg text-center overflow-hidden w-full transform hover:shadow-2xl hover:scale-105 transition duration-200 ease-in">
                    <div id="title" class="w-full py-5 border-b border-gray-800">
                    <h2 class="font-bold text-3xl">Report</h2>
                    <h3 class="font-normal text-indigo-500 text-xl mt-2">
                        Incident Report
                    </h3>
                    </div>
                    <div id="content" class="">
                        <div id="icon" class="my-5">
                            <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-12 w-12 mx-auto fill-stroke text-indigo-600"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1"
                                d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                            </svg>
                            <p class="text-gray-500 text-sm  pt-2">
                                Incident Report
                            </p>
                        </div>
                        <div id="contain" class="leading-8 mb-10 text-lg font-light">
                            <p class="text-sm pt-2 p-5">
                                Provide a consistent and structured approach to incident reporting, and implement corrective actions to prevent future incidents from occurring.
                                The Don Carlos Incident Report System may be used in a variety of settings, including healthcare facilities, and government agencies. It is an important tool for promoting safety, quality,
                                 and continuous improvement within the Municipality.
                            </p>
                            <div id="choose" class="w-full mt-10 px-6">
                                <a href="{{ route('portal') }}" class="w-full block bg-gray-900 text-white font-medium text-xl py-4 rounded-xl hover:shadow-lg transition duration-200 ease-in-out hover:bg-indigo-600 hover">
                                    Report Incident
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="plan" class="rounded-lg text-center overflow-hidden w-full transform hover:shadow-2xl hover:scale-105 transition duration-200 ease-in">
                    <div id="title" class="w-full py-5 border-b border-gray-800">
                    <h2 class="font-bold text-3xl">Dashboard</h2>
                    <h3 class="font-normal text-indigo-500 text-xl mt-2">
                        Important Features
                    </h3>
                    </div>
                    <div id="content" class="">
                    <div id="icon" class="my-5">
                        <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-12 w-12 mx-auto fill-stroke text-indigo-600"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1"
                            d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <p class="text-gray-500 text-sm pt-2">
                            Perfect Managing the Data
                        </p>
                    </div>
                    <div id="contain" class="leading-8 mb-10 text-lg font-light">
                        <p class="text-sm pt-2 p-5">
                            The central hub where authorized personnel can access, view, and manage all incidents reported on the website. The Dashboard allows you to quickly and easily view all reported incidents, and update their status as necessary. It also provides you with important statistics, such as the number of incidents reported in a specific time period, to help you gain a better understanding of the incidents occurring in the municipality. With this powerful tool, you can ensure that all incidents are handled in a timely and efficient manner, keeping the community safe and secure.
                        </p>
                        <div id="choose" class="w-full mt-10 px-6">
                        <a @role('Admin|Department')href="{{ route('adminDashboard') }}" @endrole  @role('User') href="{{ route('reports') }}" @endrole class="w-full block bg-gray-900 text-white font-medium text-xl py-4 rounded-xl hover:shadow-lg transition duration-200 ease-in-out hover:bg-indigo-600 hover">
                            Dashboard
                            </a>
                        </div>
                    </div>
                    </div>
                </div>
                <div id="plan" class="rounded-lg text-center overflow-hidden w-full transform hover:shadow-2xl hover:scale-105 transition duration-200 ease-in">
                    <div id="title" class="w-full py-5 border-b border-gray-800">
                    <h2 class="font-bold text-3xl">Frequently Asked Questions</h2>
                    <h3 class="font-normal text-indigo-500 text-xl mt-2">
                        Answers to common our Questions
                    </h3>
                    </div>
                    <div id="content" class="">
                        <div id="icon" class="my-5">
                            <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-12 w-12 mx-auto fill-stroke text-indigo-600"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                            <p class="text-gray-500 text-sm pt-2">
                                Answers to common our Questions
                            </p>
                        </div>
                        <div id="contain" class="leading-8 mb-10 text-lg font-light">
                            <p class="text-sm pt-2 p-5">
                                Frequently Asked Questions page for the Incident Reporting System for Don Carlos, Bukidnon. You will find answers to common questions about how to use our website to report incidents, who to contact if you have problems, and what types of incidents can be reported. 
                            </p>
                            <div id="choose" class="w-full mt-10 px-6">
                            <a href="{{ route('faq') }}"class="w-full block bg-gray-900 text-white font-medium text-xl py-4 rounded-xl hover:shadow-lg transition duration-200 ease-in-out hover:bg-indigo-600 hover">
                                Read FAQ
                            </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>