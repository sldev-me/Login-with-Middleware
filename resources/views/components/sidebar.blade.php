<div>

    <el-dialog>
        <dialog id="sidebar" class="backdrop:bg-transparent xl:hidden">
            <el-dialog-backdrop
                class="fixed inset-0 bg-gray-900/80 transition-opacity duration-300 ease-linear data-closed:opacity-0"></el-dialog-backdrop>

            <div tabindex="0" class="fixed inset-0 flex focus:outline-none">
                <el-dialog-panel
                    class="group/dialog-panel relative mr-16 flex w-full max-w-xs flex-1 transform transition duration-300 ease-in-out data-closed:-translate-x-full">
                    <div
                        class="absolute top-0 left-full flex w-16 justify-center pt-5 duration-300 ease-in-out group-data-closed/dialog-panel:opacity-0">
                        <button type="button" command="close" commandfor="sidebar" class="-m-2.5 p-2.5">
                            <span class="sr-only">Close sidebar</span>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                data-slot="icon" aria-hidden="true" class="size-6 text-white">
                                <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>

                    <!-- Sidebar component, swap this element with another sidebar if you like -->
                    <div class="relative flex grow flex-col gap-y-5 overflow-y-auto bg-gray-50 px-6">
                        <div class="relative flex h-16 shrink-0 items-center">
                            <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600"
                                alt="Your Company" class="h-8 w-auto" />
                        </div>
                        <nav class="relative flex flex-1 flex-col">
                            <ul role="list" class="flex flex-1 flex-col gap-y-7">
                                <li>
                                    <ul role="list" class="-mx-2 space-y-1">
                                        <li>
                                            <!-- Current: "bg-gray-100 text-indigo-600", Default: "text-gray-700 hover:text-indigo-600 hover:bg-gray-100" -->
                                            <a href="/"
                                                class="group flex gap-x-3 rounded-md p-2 text-sm/6 font-semibold @if(request()->is('/')) bg-gray-100 text-indigo-600 @else text-gray-700 hover:text-indigo-600 hover:bg-gray-100 @endif">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="1.5" data-slot="icon" aria-hidden="true"
                                                    class="size-6 shrink-0 text-gray-400 group-hover:text-indigo-600">
                                                    <path
                                                        d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                Dashboard
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="-mx-6 mt-auto">
                                    <div class="flex items-center justify-between px-6 py-3">
                                        <div class="flex items-center gap-x-4">
                                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                alt=""
                                                class="size-8 rounded-full bg-gray-100 outline -outline-offset-1 outline-black/5" />
                                            <span
                                                class="text-sm/6 font-semibold text-gray-900">{{ Auth::user()->name }}</span>
                                        </div>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit"
                                                class="text-sm font-medium text-gray-500 hover:text-red-600"
                                                title="Logout">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="size-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </el-dialog-panel>
            </div>
        </dialog>
    </el-dialog>

    <!-- Static sidebar for desktop -->
    <div class="hidden xl:fixed xl:inset-y-0 xl:z-50 xl:flex xl:w-72 xl:flex-col">
        <!-- Sidebar component, swap this element with another sidebar if you like -->
        <div class="flex grow flex-col gap-y-5 overflow-y-auto bg-gray-50 px-6 ring-1 ring-gray-200">
            <div class="flex h-16 shrink-0 items-center">
                <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600"
                    alt="Your Company" class="h-8 w-auto" />
            </div>
            <nav class="flex flex-1 flex-col">
                <ul role="list" class="flex flex-1 flex-col gap-y-7">
                    <li>
                        <ul role="list" class="-mx-2 space-y-1">
                            <li>
                                <!-- Current: "bg-gray-100 text-indigo-600", Default: "text-gray-700 hover:text-indigo-600 hover:bg-gray-100" -->
                                <a href="#"
                                    class="group flex gap-x-3 rounded-md p-2 text-sm/6 font-semibold @if(request()->is('/')) bg-gray-100 text-indigo-600 @else text-gray-700 hover:text-indigo-600 hover:bg-gray-100 @endif">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                        data-slot="icon" aria-hidden="true"
                                        class="size-6 shrink-0 @if(request()->is('/')) text-indigo-600 group-hover:text-indigo-600 @else text-gray-400 @endif">
                                        <path
                                            d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    Dashboard
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="-mx-6 mt-auto">
                        <div class="flex items-center justify-between px-6 py-3">
                            <div class="flex items-center gap-x-4">
                                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                    alt=""
                                    class="size-8 rounded-full bg-gray-100 outline -outline-offset-1 outline-black/5" />
                                <span class="text-sm/6 font-semibold text-gray-900">{{ Auth::user()->name }}</span>
                            </div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="text-sm font-medium text-gray-500 hover:text-red-600"
                                    title="Logout">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

</div>