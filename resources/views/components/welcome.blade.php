<!--
  Heads up! 👋

  This component comes with some `rtl` classes. Please remove them if they are not needed in your project.
-->

<section
  class="dashboard relative bg-cover bg-center bg-no-repeat"
>
  <div
    class="dashboard-gradient absolute inset-0 bg-white/75 sm:bg-transparent sm:from-white/95 sm:to-white/25 ltr:sm:bg-gradient-to-r rtl:sm:bg-gradient-to-l"
  ></div>

  <div
    class="relative mx-auto max-w-screen-xl px-4 py-32 sm:px-6 lg:flex lg:h-screen lg:items-center lg:px-8"
  >
    <div class="max-w-xl text-center ltr:sm:text-left rtl:sm:text-right">
      <h1 class="text-3xl font-extrabold sm:text-5xl">
        Hi <span class="text-blue-900">{{auth()->user()->name}}</span> Welcome to 

        <strong class="block font-extrabold text-blue-900"> EduNexus. </strong>
      </h1>

      <p class="mt-4 max-w-lg sm:text-xl/relaxed">
        We’re excited to have you here! Whether you’re exploring new subjects, enhancing your skills, or connecting with fellow learners, we’re dedicated to supporting your growth.
      </p>

      <div class="mt-8 flex flex-wrap gap-4 text-center">
        <a
          href="{{route('learning')}}"
          class="block w-full rounded  px-12 py-3 text-sm font-medium text-white shadow hover:bg-blue-900 focus:outline-none focus:ring active:bg-rose-500 sm:w-auto"
        >
          Get Started
        </a>

      </div>
    </div>
  </div>
</section>
