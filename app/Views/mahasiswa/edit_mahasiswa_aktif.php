<link href="./tailwind.css" rel="stylesheet" />
<div class="w-full shadow-lg rounded-lg flex flex-col h-full bg-white mb-4 overflow-y-scroll">
  <table class="text-left w-full border-collapse">
    <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
    <thead class="">
      <tr>
        <th class="py-4 px-6 font-bold uppercase text-sm text-grey-800 border-b">Nama</th>
        <th class="py-4 px-6 font-bold uppercase text-sm text-grey-800 border-b">NIM</th>
        <th class="py-4 px-6 font-bold uppercase text-sm text-grey-800 border-b">Fakultas</th>
        <th class="py-4 px-6 font-bold uppercase text-sm text-grey-800 border-b">Jurusan</th>
        <th class="py-4 px-6 font-bold uppercase text-sm text-grey-800 border-b">Status</th>
      </tr>
    </thead>
    <tbody>
      <tr class="hover:bg-green-100 transition duration-200">
        <td class="py-4 px-6 border-b border-grey-light">Sumill</td>
        <td class="py-4 px-6 border-b border-grey-light">160000</td>
        <td class="py-4 px-6 border-b border-grey-light">Teknik</td>
        <td class="py-4 px-6 border-b border-grey-light">Teknik Informatika</td>
        <td class="py-4 px-6 border-b border-grey-light flex flex-row">
          Aktif
          <span class="ml-5">
            <div class="w-6 h-6 rounded-md bg-green-200 hover:bg-green-400"></div>
          </span>
        </td>
      </tr>
      <tr class="hover:bg-green-100 transition duration-200">
        <td class="py-4 px-6 border-b border-grey-light">Sumill</td>
        <td class="py-4 px-6 border-b border-grey-light">160000</td>
        <td class="py-4 px-6 border-b border-grey-light">Teknik</td>
        <td class="py-4 px-6 border-b border-grey-light">Teknik Informatika</td>
        <td class="py-4 px-6 border-b border-grey-light flex flex-row">
          Aktif
          <span class="ml-5">
            <div class="w-6 h-6 rounded-md bg-green-200 hover:bg-green-400"></div>
          </span>
        </td>
      </tr>
      <tr class="hover:bg-green-100 transition duration-200">
        <td class="py-4 px-6 border-b border-grey-light">Sumill</td>
        <td class="py-4 px-6 border-b border-grey-light">160000</td>
        <td class="py-4 px-6 border-b border-grey-light">Teknik</td>
        <td class="py-4 px-6 border-b border-grey-light">Teknik Informatika</td>
        <td class="py-4 px-6 border-b border-grey-light flex flex-row">
          Tidak
          <span class="ml-4">
            <div class="w-6 h-6 rounded-md bg-red-200"></div>
          </span>
        </td>
      </tr>
      <tr class="hover:bg-green-100 transition duration-200">
        <td class="py-4 px-6 border-b border-grey-light">Sumill</td>
        <td class="py-4 px-6 border-b border-grey-light">160000</td>
        <td class="py-4 px-6 border-b border-grey-light">Teknik</td>
        <td class="py-4 px-6 border-b border-grey-light">Teknik Informatika</td>
        <td class="py-4 px-6 border-b border-grey-light flex flex-row">
          Tidak
          <span class="ml-4">
            <div class="w-6 h-6 rounded-md bg-red-200"></div>
          </span>
        </td>
      </tr>
    </tbody>
  </table>
</div>
