<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="<?= base_url('/tailwind.css') ?>" rel="stylesheet" />

  <!-- <title>Login</title> -->
  <style>
    @media screen and (max-width: 768px) {
      ::-webkit-scrollbar {
        height: 4px;
      }
    }

    /* width */
    ::-webkit-scrollbar {
      width: 4px;
    }


    /* Track */
    ::-webkit-scrollbar-track {
      background: #ffffff00;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
      background: #a7f3d0;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
      background: #6ee7b7;
    }
  </style>
</head>

<body class="bg-gray-100 flex flex-row h-screen w-full">
  <!-- sidebar -->
  <div class="hidden lg:flex flex-col w-2/12 py-2 ml-4 my-4 shadow-xl rounded-lg bg-white overflow-y-scroll">
    <div class="w-full text-center flex flex-row justify-center">
      <a href="<?= base_url('/dashboard') ?>">
        <!-- <h1 class="font-bold font-sans text-2xl text-gray-800 mb-5">Logo</h1> -->
        <img class="w-10" src="<?= base_url('/assets/images/logo.png')?>" alt="logo" />
      </a>
    </div>
    <a class="
          w-full
          font-thin
          uppercase
          
          flex
          items-center
          p-4
          my-2
          transition-colors
          duration-200
          justify-start
          <?= ($page_title == 'Dashboard') ? "bg-gradient-to-r
          from-white
          to-green-100
          border-r-4 
          border-green-500 
          text-green-500 " : " text-gray-500 " ?>
        " href="<?= base_url('/dashboard') ?>">
      <span class="text-left">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" class="m-auto" xmlns="http://www.w3.org/2000/svg">
          <path d="M19 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3ZM5 19V5H11V19H5ZM19 19H13V12H19V19ZM19 10H13V5H19V10Z" />
        </svg>
      </span>
      <span class="mx-4 text-sm font-normal"> Dashboard </span>
    </a>
    <!-- menu 2 -->
    <a class="
          w-full
          font-thin
          uppercase
          <?= ($page_title == 'Daftar anggota') ? "bg-gradient-to-r
          from-white
          to-green-100
          border-r-4 
          border-green-500 
          text-green-500 " : " text-gray-500 " ?>
          dark:text-gray-200
          flex
          items-center
          p-4
          my-2
          transition-colors
          duration-200
          justify-start
          hover:text-green-500
        " href="<?= base_url('/dashboard/anggota') ?>">
      <span class="text-left">
        <svg width="20" height="20" viewBox="0 0 16 16" fill="currentColor" class="m-auto" xmlns="http://www.w3.org/2000/svg">
          <path d="M15 14C15 14 16 14 16 13C16 12 15 9 11 9C7 9 6 12 6 13C6 14 7 14 7 14H15ZM7.022 13C7.01461 12.999 7.00727 12.9976 7 12.996C7.001 12.732 7.167 11.966 7.76 11.276C8.312 10.629 9.282 10 11 10C12.717 10 13.687 10.63 14.24 11.276C14.833 11.966 14.998 12.733 15 12.996L14.992 12.998C14.9874 12.9988 14.9827 12.9995 14.978 13H7.022V13ZM11 7C11.5304 7 12.0391 6.78929 12.4142 6.41421C12.7893 6.03914 13 5.53043 13 5C13 4.46957 12.7893 3.96086 12.4142 3.58579C12.0391 3.21071 11.5304 3 11 3C10.4696 3 9.96086 3.21071 9.58579 3.58579C9.21071 3.96086 9 4.46957 9 5C9 5.53043 9.21071 6.03914 9.58579 6.41421C9.96086 6.78929 10.4696 7 11 7ZM14 5C14 5.39397 13.9224 5.78407 13.7716 6.14805C13.6209 6.51203 13.3999 6.84274 13.1213 7.12132C12.8427 7.3999 12.512 7.62087 12.1481 7.77164C11.7841 7.9224 11.394 8 11 8C10.606 8 10.2159 7.9224 9.85195 7.77164C9.48797 7.62087 9.15726 7.3999 8.87868 7.12132C8.6001 6.84274 8.37913 6.51203 8.22836 6.14805C8.0776 5.78407 8 5.39397 8 5C8 4.20435 8.31607 3.44129 8.87868 2.87868C9.44129 2.31607 10.2044 2 11 2C11.7956 2 12.5587 2.31607 13.1213 2.87868C13.6839 3.44129 14 4.20435 14 5V5ZM6.936 9.28C6.53598 9.15404 6.12364 9.07123 5.706 9.033C5.47133 9.01069 5.23573 8.99967 5 9C1 9 0 12 0 13C0 13.667 0.333 14 1 14H5.216C5.06776 13.6878 4.99382 13.3455 5 13C5 11.99 5.377 10.958 6.09 10.096C6.333 9.802 6.616 9.527 6.936 9.28ZM4.92 10C4.32815 10.8893 4.00844 11.9318 4 13H1C1 12.74 1.164 11.97 1.76 11.276C2.305 10.64 3.252 10.02 4.92 10.001V10ZM1.5 5.5C1.5 4.70435 1.81607 3.94129 2.37868 3.37868C2.94129 2.81607 3.70435 2.5 4.5 2.5C5.29565 2.5 6.05871 2.81607 6.62132 3.37868C7.18393 3.94129 7.5 4.70435 7.5 5.5C7.5 6.29565 7.18393 7.05871 6.62132 7.62132C6.05871 8.18393 5.29565 8.5 4.5 8.5C3.70435 8.5 2.94129 8.18393 2.37868 7.62132C1.81607 7.05871 1.5 6.29565 1.5 5.5V5.5ZM4.5 3.5C3.96957 3.5 3.46086 3.71071 3.08579 4.08579C2.71071 4.46086 2.5 4.96957 2.5 5.5C2.5 6.03043 2.71071 6.53914 3.08579 6.91421C3.46086 7.28929 3.96957 7.5 4.5 7.5C5.03043 7.5 5.53914 7.28929 5.91421 6.91421C6.28929 6.53914 6.5 6.03043 6.5 5.5C6.5 4.96957 6.28929 4.46086 5.91421 4.08579C5.53914 3.71071 5.03043 3.5 4.5 3.5Z" />
        </svg>
      </span>
      <span class="mx-4 text-sm font-normal"> Daftar Anggota </span>
    </a>
    <a class="
    <?= ($user_info['email'] == 'admin@admin.com') ? 'flex' : 'hidden'?>

          w-full
          font-thin
          uppercase
          <?= ($page_title == 'Tambah anggota') ? "bg-gradient-to-r
          from-white
          to-green-100
          border-r-4 
          border-green-500 
          text-green-500 " : " text-gray-500 " ?>
          dark:text-gray-200
          flex
          items-center
          p-4
          my-2
          transition-colors
          duration-200
          justify-start
          hover:text-green-500
        " href="<?= base_url('/dashboard/anggota/add') ?>">
      <span class="text-left">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor" class="m-auto" xmlns="http://www.w3.org/2000/svg">
          <path d="M11 10C11.104 10 11.205 10.008 11.305 10.023C10.915 10.302 10.562 10.631 10.257 11H4C3.73478 11 3.48043 11.1054 3.29289 11.2929C3.10536 11.4804 3 11.7348 3 12V13.5C3 14.907 4.579 16 7.5 16C8.05971 16.0037 8.61862 15.9572 9.17 15.861C9.253 16.19 9.367 16.506 9.506 16.808C8.84559 16.9399 8.17345 17.0043 7.5 17C4.088 17 2 15.554 2 13.5V12C2 11.4696 2.21071 10.9609 2.58579 10.5858C2.96086 10.2107 3.46957 10 4 10H11Z" />
          <path d="M17 6.5C17 7.16304 16.7366 7.79893 16.2678 8.26777C15.7989 8.73661 15.163 9 14.5 9C13.837 9 13.2011 8.73661 12.7322 8.26777C12.2634 7.79893 12 7.16304 12 6.5C12 5.83696 12.2634 5.20107 12.7322 4.73223C13.2011 4.26339 13.837 4 14.5 4C15.163 4 15.7989 4.26339 16.2678 4.73223C16.7366 5.20107 17 5.83696 17 6.5V6.5ZM14.5 5C14.1022 5 13.7206 5.15804 13.4393 5.43934C13.158 5.72064 13 6.10218 13 6.5C13 6.89782 13.158 7.27936 13.4393 7.56066C13.7206 7.84196 14.1022 8 14.5 8C14.8978 8 15.2794 7.84196 15.5607 7.56066C15.842 7.27936 16 6.89782 16 6.5C16 6.10218 15.842 5.72064 15.5607 5.43934C15.2794 5.15804 14.8978 5 14.5 5Z" />
          <path d="M7.5 2C7.95963 2 8.41475 2.09053 8.83939 2.26642C9.26403 2.44231 9.64987 2.70012 9.97487 3.02513C10.2999 3.35013 10.5577 3.73597 10.7336 4.16061C10.9095 4.58525 11 5.04037 11 5.5C11 5.95963 10.9095 6.41475 10.7336 6.83939C10.5577 7.26403 10.2999 7.64987 9.97487 7.97487C9.64987 8.29988 9.26403 8.55769 8.83939 8.73358C8.41475 8.90947 7.95963 9 7.5 9C6.57174 9 5.6815 8.63125 5.02513 7.97487C4.36875 7.3185 4 6.42826 4 5.5C4 4.57174 4.36875 3.6815 5.02513 3.02513C5.6815 2.36875 6.57174 2 7.5 2V2ZM7.5 3C6.83696 3 6.20107 3.26339 5.73223 3.73223C5.26339 4.20107 5 4.83696 5 5.5C5 6.16304 5.26339 6.79893 5.73223 7.26777C6.20107 7.73661 6.83696 8 7.5 8C8.16304 8 8.79893 7.73661 9.26777 7.26777C9.73661 6.79893 10 6.16304 10 5.5C10 4.83696 9.73661 4.20107 9.26777 3.73223C8.79893 3.26339 8.16304 3 7.5 3Z" />
          <path d="M19 14.5C19 15.6935 18.5259 16.8381 17.682 17.682C16.8381 18.5259 15.6935 19 14.5 19C13.3065 19 12.1619 18.5259 11.318 17.682C10.4741 16.8381 10 15.6935 10 14.5C10 13.3065 10.4741 12.1619 11.318 11.318C12.1619 10.4741 13.3065 10 14.5 10C15.6935 10 16.8381 10.4741 17.682 11.318C18.5259 12.1619 19 13.3065 19 14.5V14.5ZM15 12.5C15 12.3674 14.9473 12.2402 14.8536 12.1464C14.7598 12.0527 14.6326 12 14.5 12C14.3674 12 14.2402 12.0527 14.1464 12.1464C14.0527 12.2402 14 12.3674 14 12.5V14H12.5C12.3674 14 12.2402 14.0527 12.1464 14.1464C12.0527 14.2402 12 14.3674 12 14.5C12 14.6326 12.0527 14.7598 12.1464 14.8536C12.2402 14.9473 12.3674 15 12.5 15H14V16.5C14 16.6326 14.0527 16.7598 14.1464 16.8536C14.2402 16.9473 14.3674 17 14.5 17C14.6326 17 14.7598 16.9473 14.8536 16.8536C14.9473 16.7598 15 16.6326 15 16.5V15H16.5C16.6326 15 16.7598 14.9473 16.8536 14.8536C16.9473 14.7598 17 14.6326 17 14.5C17 14.3674 16.9473 14.2402 16.8536 14.1464C16.7598 14.0527 16.6326 14 16.5 14H15V12.5Z" />
        </svg>
      </span>
      <span class="mx-4 text-sm font-normal"> Tambah Anggota </span>
    </a>
    <a class="
          w-full
          font-thin
          uppercase
          <?= ($page_title == 'Mahasiswa aktif') ? "bg-gradient-to-r
          from-white
          to-green-100
          border-r-4 
          border-green-500 
          text-green-500 " : " text-gray-500 " ?>
          dark:text-gray-200
          flex
          items-center
          p-4
          my-2
          transition-colors
          duration-200
          justify-start
          hover:text-green-500
        " href="<?= base_url('/dashboard/mahasiswa') ?>">
      <span class="text-left">
        <svg width="20" height="20" viewBox="0 0 16 16" fill="currentColor" class="m-auto" xmlns="http://www.w3.org/2000/svg">
          <g clip-path="url(#clip0)">
            <path d="M12 1C12.2652 1 12.5196 1.10536 12.7071 1.29289C12.8946 1.48043 13 1.73478 13 2V12.755C13 12.755 12 11 8 11C4 11 3 12.755 3 12.755V2C3 1.73478 3.10536 1.48043 3.29289 1.29289C3.48043 1.10536 3.73478 1 4 1H12ZM4 0C3.46957 0 2.96086 0.210714 2.58579 0.585786C2.21071 0.960859 2 1.46957 2 2V14C2 14.5304 2.21071 15.0391 2.58579 15.4142C2.96086 15.7893 3.46957 16 4 16H12C12.5304 16 13.0391 15.7893 13.4142 15.4142C13.7893 15.0391 14 14.5304 14 14V2C14 1.46957 13.7893 0.960859 13.4142 0.585786C13.0391 0.210714 12.5304 0 12 0L4 0Z" />
            <path d="M8 10C8.39397 10 8.78407 9.9224 9.14805 9.77164C9.51203 9.62087 9.84274 9.3999 10.1213 9.12132C10.3999 8.84274 10.6209 8.51203 10.7716 8.14805C10.9224 7.78407 11 7.39397 11 7C11 6.60603 10.9224 6.21593 10.7716 5.85195C10.6209 5.48797 10.3999 5.15726 10.1213 4.87868C9.84274 4.6001 9.51203 4.37913 9.14805 4.22836C8.78407 4.0776 8.39397 4 8 4C7.20435 4 6.44129 4.31607 5.87868 4.87868C5.31607 5.44129 5 6.20435 5 7C5 7.79565 5.31607 8.55871 5.87868 9.12132C6.44129 9.68393 7.20435 10 8 10V10Z" />
          </g>
          <defs>
            <clipPath id="clip0">
              <rect width="20" height="20" fill="white" />
            </clipPath>
          </defs>
        </svg>
      </span>
      <span class="mx-4 text-sm font-normal"> Mahasiswa Aktif </span>
    </a>
    <a class="
          w-full
          font-thin
          uppercase
          <?= ($page_title == 'Siswa') ? "bg-gradient-to-r
          from-white
          to-green-100
          border-r-4 
          border-green-500 
          text-green-500 " : " text-gray-500 " ?>
          dark:text-gray-200
          flex
          items-center
          p-4
          my-2
          transition-colors
          duration-200
          justify-start
          hover:text-green-500
        " href="<?= base_url('/dashboard/pelajar') ?>">
      <span class="text-left">
        <svg width="20" height="20" viewBox="0 0 16 16" fill="currentColor" class="m-auto" xmlns="http://www.w3.org/2000/svg">
          <g clip-path="url(#clip0)">
            <path d="M12 1C12.2652 1 12.5196 1.10536 12.7071 1.29289C12.8946 1.48043 13 1.73478 13 2V12.755C13 12.755 12 11 8 11C4 11 3 12.755 3 12.755V2C3 1.73478 3.10536 1.48043 3.29289 1.29289C3.48043 1.10536 3.73478 1 4 1H12ZM4 0C3.46957 0 2.96086 0.210714 2.58579 0.585786C2.21071 0.960859 2 1.46957 2 2V14C2 14.5304 2.21071 15.0391 2.58579 15.4142C2.96086 15.7893 3.46957 16 4 16H12C12.5304 16 13.0391 15.7893 13.4142 15.4142C13.7893 15.0391 14 14.5304 14 14V2C14 1.46957 13.7893 0.960859 13.4142 0.585786C13.0391 0.210714 12.5304 0 12 0L4 0Z" />
            <path d="M8 10C8.39397 10 8.78407 9.9224 9.14805 9.77164C9.51203 9.62087 9.84274 9.3999 10.1213 9.12132C10.3999 8.84274 10.6209 8.51203 10.7716 8.14805C10.9224 7.78407 11 7.39397 11 7C11 6.60603 10.9224 6.21593 10.7716 5.85195C10.6209 5.48797 10.3999 5.15726 10.1213 4.87868C9.84274 4.6001 9.51203 4.37913 9.14805 4.22836C8.78407 4.0776 8.39397 4 8 4C7.20435 4 6.44129 4.31607 5.87868 4.87868C5.31607 5.44129 5 6.20435 5 7C5 7.79565 5.31607 8.55871 5.87868 9.12132C6.44129 9.68393 7.20435 10 8 10V10Z" />
          </g>
          <defs>
            <clipPath id="clip0">
              <rect width="20" height="20" fill="white" />
            </clipPath>
          </defs>
        </svg>
      </span>
      <span class="mx-4 text-sm font-normal"> Siswa </span>
    </a>
    <a class="
          w-full
          font-thin
          uppercase
          <?= ($page_title == 'Inventaris') ? "bg-gradient-to-r
          from-white
          to-green-100
          border-r-4 
          border-green-500 
          text-green-500 " : " text-gray-500 " ?>
          dark:text-gray-200
          flex
          items-center
          p-4
          my-2
          transition-colors
          duration-200
          justify-start
          hover:text-green-500
        " href="<?= base_url('/dashboard/inventaris') ?>">
      <span class="text-left">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" class="m-auto" xmlns="http://www.w3.org/2000/svg">
          <path d="M20 3H4C2.897 3 2 3.897 2 5V7C2 7.736 2.405 8.375 3 8.722V19C3 20.103 3.897 21 5 21H19C20.103 21 21 20.103 21 19V8.722C21.595 8.375 22 7.736 22 7V5C22 3.897 21.103 3 20 3ZM4 5H20L20.002 7H4V5ZM5 19V9H19L19.002 19H5Z" />
          <path d="M8 11H16V13H8V11Z" />
        </svg>
      </span>
      <span class="mx-4 text-sm font-normal"> Inventaris </span>
    </a>
    <a class="
          w-full
          font-thin
          uppercase
          <?= ($page_title == 'Informasi') ? "bg-gradient-to-r
          from-white
          to-green-100
          border-r-4 
          border-green-500 
          text-green-500 " : " text-gray-500 " ?>
          dark:text-gray-200
          flex
          items-center
          p-4
          my-2
          transition-colors
          duration-200
          justify-start
          hover:text-green-500
        " href="<?= base_url('/dashboard/informasi') ?>">
      <span class="text-left">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor" class="m-auto" xmlns="http://www.w3.org/2000/svg">
          <path d="M5 6.5C5 6.36739 5.05268 6.24021 5.14645 6.14645C5.24021 6.05268 5.36739 6 5.5 6H12.5C12.6326 6 12.7598 6.05268 12.8536 6.14645C12.9473 6.24021 13 6.36739 13 6.5C13 6.63261 12.9473 6.75979 12.8536 6.85355C12.7598 6.94732 12.6326 7 12.5 7H5.5C5.36739 7 5.24021 6.94732 5.14645 6.85355C5.05268 6.75979 5 6.63261 5 6.5Z" />
          <path d="M10.5 9C10.3674 9 10.2402 9.05268 10.1464 9.14645C10.0527 9.24021 10 9.36739 10 9.5C10 9.63261 10.0527 9.75979 10.1464 9.85355C10.2402 9.94732 10.3674 10 10.5 10H12.5C12.6326 10 12.7598 9.94732 12.8536 9.85355C12.9473 9.75979 13 9.63261 13 9.5C13 9.36739 12.9473 9.24021 12.8536 9.14645C12.7598 9.05268 12.6326 9 12.5 9H10.5Z" />
          <path d="M10 12.5C10 12.3674 10.0527 12.2402 10.1464 12.1464C10.2402 12.0527 10.3674 12 10.5 12H12.5C12.6326 12 12.7598 12.0527 12.8536 12.1464C12.9473 12.2402 13 12.3674 13 12.5C13 12.6326 12.9473 12.7598 12.8536 12.8536C12.7598 12.9473 12.6326 13 12.5 13H10.5C10.3674 13 10.2402 12.9473 10.1464 12.8536C10.0527 12.7598 10 12.6326 10 12.5Z" />
          <path d="M5.5 9C5.36739 9 5.24021 9.05268 5.14645 9.14645C5.05268 9.24021 5 9.36739 5 9.5V12.5C5 12.6326 5.05268 12.7598 5.14645 12.8536C5.24021 12.9473 5.36739 13 5.5 13H8.5C8.63261 13 8.75979 12.9473 8.85355 12.8536C8.94732 12.7598 9 12.6326 9 12.5V9.5C9 9.36739 8.94732 9.24021 8.85355 9.14645C8.75979 9.05268 8.63261 9 8.5 9H5.5ZM6 12V10H8V12H6Z" />
          <path d="M2 5C2 4.46957 2.21071 3.96086 2.58579 3.58579C2.96086 3.21071 3.46957 3 4 3H14C14.5304 3 15.0391 3.21071 15.4142 3.58579C15.7893 3.96086 16 4.46957 16 5V6C16.5304 6 17.0391 6.21071 17.4142 6.58579C17.7893 6.96086 18 7.46957 18 8V13.5C18 14.163 17.7366 14.7989 17.2678 15.2678C16.7989 15.7366 16.163 16 15.5 16H4.5C3.83696 16 3.20107 15.7366 2.73223 15.2678C2.26339 14.7989 2 14.163 2 13.5V5ZM15 5C15 4.73478 14.8946 4.48043 14.7071 4.29289C14.5196 4.10536 14.2652 4 14 4H4C3.73478 4 3.48043 4.10536 3.29289 4.29289C3.10536 4.48043 3 4.73478 3 5V13.5C3 13.8978 3.15804 14.2794 3.43934 14.5607C3.72064 14.842 4.10218 15 4.5 15H15.5C15.8978 15 16.2794 14.842 16.5607 14.5607C16.842 14.2794 17 13.8978 17 13.5V8C17 7.73478 16.8946 7.48043 16.7071 7.29289C16.5196 7.10536 16.2652 7 16 7V13.5C16 13.6326 15.9473 13.7598 15.8536 13.8536C15.7598 13.9473 15.6326 14 15.5 14C15.3674 14 15.2402 13.9473 15.1464 13.8536C15.0527 13.7598 15 13.6326 15 13.5V5Z" />
        </svg>
      </span>
      <span class="mx-4 text-sm font-normal"> Informasi </span>
    </a>
    <a class="
          w-full
          font-thin
          uppercase
          <?= ($page_title == 'Presensi') ? "bg-gradient-to-r
          from-white
          to-green-100
          border-r-4 
          border-green-500 
          text-green-500 " : " text-gray-500 " ?>
          dark:text-gray-200
          flex
          items-center
          p-4
          my-2
          transition-colors
          duration-200
          justify-start
          hover:text-green-500
        " href="<?= base_url('/dashboard/presensi') ?>">
      <span class="text-left">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="white" class="m-auto" xmlns="http://www.w3.org/2000/svg">
          <path d="M17 3H7C4.79086 3 3 4.79086 3 7V17C3 19.2091 4.79086 21 7 21H17C19.2091 21 21 19.2091 21 17V7C21 4.79086 19.2091 3 17 3Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          <path d="M9 12L11.25 14L15 10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </span>
      <span class="mx-4 text-sm font-normal"> Presensi </span>
    </a>
    <a class="
          w-full
          font-thin
          uppercase
          <?= ($page_title == 'Keuangan') ? "bg-gradient-to-r
          from-white
          to-green-100
          border-r-4 
          border-green-500 
          text-green-500 " : " text-gray-500 " ?>
          dark:text-gray-200
          flex
          items-center
          p-4
          my-2
          transition-colors
          duration-200
          justify-start
          hover:text-green-500
        " href="<?= base_url('/dashboard/keuangan') ?>">
      <span class="text-left">

        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" class="m-auto" xmlns="http://www.w3.org/2000/svg">
          <path d="M5 9C5.26522 9 5.51957 9.10536 5.70711 9.29289C5.89464 9.48043 6 9.73478 6 10C7.57114 9.99769 9.09698 10.5263 10.33 11.5H12.5C13.833 11.5 15.03 12.08 15.854 13H19C19.9453 12.9997 20.8712 13.2674 21.6705 13.772C22.4698 14.2767 23.1097 14.9975 23.516 15.851C21.151 18.972 17.322 21 13 21C10.21 21 7.85 20.397 5.94 19.342C5.87004 19.5351 5.74224 19.7018 5.57402 19.8196C5.40579 19.9374 5.20534 20.0003 5 20H2C1.73478 20 1.48043 19.8946 1.29289 19.7071C1.10536 19.5196 1 19.2652 1 19V10C1 9.73478 1.10536 9.48043 1.29289 9.29289C1.48043 9.10536 1.73478 9 2 9H5ZM6.001 12L6 17.022L6.045 17.054C7.84 18.314 10.178 19 13 19C16.004 19 18.799 17.844 20.835 15.87L20.968 15.737L20.848 15.637C20.3758 15.2672 19.8034 15.0477 19.205 15.007L19 15H16.889C16.961 15.322 17 15.656 17 16V17H8V15L14.79 14.999L14.756 14.921C14.5644 14.5205 14.2696 14.1783 13.9019 13.9295C13.5343 13.6806 13.107 13.5341 12.664 13.505L12.5 13.5H9.57C9.10531 13.0247 8.55027 12.6472 7.93752 12.3896C7.32477 12.132 6.66669 11.9995 6.002 12H6.001ZM4 11H3V18H4V11ZM18 5C18.7956 5 19.5587 5.31607 20.1213 5.87868C20.6839 6.44129 21 7.20435 21 8C21 8.79565 20.6839 9.55871 20.1213 10.1213C19.5587 10.6839 18.7956 11 18 11C17.2044 11 16.4413 10.6839 15.8787 10.1213C15.3161 9.55871 15 8.79565 15 8C15 7.20435 15.3161 6.44129 15.8787 5.87868C16.4413 5.31607 17.2044 5 18 5ZM18 7C17.7348 7 17.4804 7.10536 17.2929 7.29289C17.1054 7.48043 17 7.73478 17 8C17 8.26522 17.1054 8.51957 17.2929 8.70711C17.4804 8.89464 17.7348 9 18 9C18.2652 9 18.5196 8.89464 18.7071 8.70711C18.8946 8.51957 19 8.26522 19 8C19 7.73478 18.8946 7.48043 18.7071 7.29289C18.5196 7.10536 18.2652 7 18 7ZM11 2C11.7956 2 12.5587 2.31607 13.1213 2.87868C13.6839 3.44129 14 4.20435 14 5C14 5.79565 13.6839 6.55871 13.1213 7.12132C12.5587 7.68393 11.7956 8 11 8C10.2044 8 9.44129 7.68393 8.87868 7.12132C8.31607 6.55871 8 5.79565 8 5C8 4.20435 8.31607 3.44129 8.87868 2.87868C9.44129 2.31607 10.2044 2 11 2V2ZM11 4C10.7348 4 10.4804 4.10536 10.2929 4.29289C10.1054 4.48043 10 4.73478 10 5C10 5.26522 10.1054 5.51957 10.2929 5.70711C10.4804 5.89464 10.7348 6 11 6C11.2652 6 11.5196 5.89464 11.7071 5.70711C11.8946 5.51957 12 5.26522 12 5C12 4.73478 11.8946 4.48043 11.7071 4.29289C11.5196 4.10536 11.2652 4 11 4V4Z" />
        </svg>
      </span>
      <span class="mx-4 text-sm font-normal"> Keuangan </span>
    </a>
  </div>
  <div class="w-full lg:w-10/12 flex flex-col">
    <!-- navbar  -->
    <div class="
          relative
          flex flex-row
          justify-between
          lg:justify-end
          px-5
          md:px-10
          m-4
          items-center
          rounded-lg
          shadow-xl
          bg-green-200
        ">
      <div class="flex px-5 py-2 items-center lg:hidden">
        <a href="<?= base_url('/dashboard') ?>">
          <!-- <h1 class="font-bold font-sans text-2xl text-gray-800">Logo</h1> -->
          <img class="w-10" src="<?= base_url('/assets/images/logo.png')?>" alt="logo" />
        </a>
      </div>
      <div id="adminButton" onclick="openDropdown()" class="admin-button cursor-pointer flex flex-row items-center rounded-full px-3 py-2 my-2 bg-white">
        <div class="h-8 w-8 rounded-full bg-green-200 overflow-hidden">
          <img class="w-8" src="<?= $user_info['profile_url'] ?>" alt="profile-picture">
        </div>
        <span class="font-semibold text-base text-gray-800 mx-2"><?= $user_info['name'] ?></span>
        <img src="<?= base_url('/assets/icons/arrow_down_icon.svg') ?>" class="w-3 h-3" alt="arrow_down_icon" />
      </div>
      <!-- dropdown -->
      <div id="dropdownMenu" class="dropdown-menu absolute top-0 right-0 w-52 h-80 lg:h-auto shadow-xl hidden flex-col px-5 py-2 bg-white rounded-lg">
        <div class="h-full w-full overflow-y-scroll flex flex-col pr-2">
          <a class="
                w-full
                cursor-pointer
                uppercase
                font-semibold
                <?= ($page_title == 'Dashboard') ? " text-green-500 " : " text-gray-500 " ?>
                flex
                items-center
                py-3
                border-b-2 border-green-300
                lg:hidden
              " href="<?= base_url('/dashboard') ?>">
            <span class="text-sm font-normal"> Dashboard </span>
          </a>
          <a class="
                w-full
                cursor-pointer
                uppercase
                font-semibold
                <?= ($page_title == 'Daftar anggota') ? " text-green-500 " : " text-gray-500 " ?>
                flex
                items-center
                py-3
                border-b-2 border-green-300
                lg:hidden
              " href="<?= base_url('/dashboard/anggota') ?>">
            <span class="text-sm font-normal"> Daftar anggota </span>
          </a>
          <a class="
                w-full
                cursor-pointer
                uppercase
                font-semibold
                <?= ($page_title == 'Tambah anggota') ? " text-green-500 " : " text-gray-500 " ?>
                flex
                items-center
                py-3
                border-b-2 border-green-300
                lg:hidden
              " href="<?= base_url('/dashboard/anggota/add') ?>">
            <span class="text-sm font-normal"> Tambah Anggota </span>
          </a>
          <a class="
                w-full
                cursor-pointer
                uppercase
                font-semibold
                <?= ($page_title == 'Mahasiswa aktif') ? " text-green-500 " : " text-gray-500 " ?>
                flex
                items-center
                py-3
                border-b-2 border-green-300
                lg:hidden
              " href="<?= base_url('/dashboard/mahasiswa') ?>">
            <span class="text-sm font-normal"> Mahasiswa Aktif </span>
          </a>
          <a class="
                w-full
                cursor-pointer
                uppercase
                font-semibold
                <?= ($page_title == 'Siswa') ? " text-green-500 " : " text-gray-500 " ?>
                flex
                items-center
                py-3
                border-b-2 border-green-300
                lg:hidden
              " href="<?= base_url('/dashboard/pelajar') ?>">
            <span class="text-sm font-normal"> Siswa </span>
          </a>
          <a class="
                w-full
                cursor-pointer
                uppercase
                font-semibold
                <?= ($page_title == 'Inventaris') ? " text-green-500 " : " text-gray-500 " ?>
                flex
                items-center
                py-3
                border-b-2 border-green-300
                lg:hidden
              " href="<?= base_url('/dashboard/inventaris') ?>">
            <span class="text-sm font-normal"> Inventaris </span>
          </a>
          <a class="
                w-full
                cursor-pointer
                uppercase
                font-semibold
                <?= ($page_title == 'Informasi') ? " text-green-500 " : " text-gray-500 " ?>
                flex
                items-center
                py-3
                border-b-2 border-green-300
                lg:hidden
              " href="<?= base_url('/dashboard/informasi') ?>">
            <span class="text-sm font-normal"> Informasi </span>
          </a>
          <a class="
                w-full
                cursor-pointer
                uppercase
                font-semibold
                <?= ($page_title == 'Presensi') ? " text-green-500 " : " text-gray-500 " ?>
                flex
                items-center
                py-3
                border-b-2 border-green-300
                lg:hidden
              " href="<?= base_url('/dashboard/presensi') ?>">
            <span class="text-sm font-normal"> Presensi </span>
          </a>
          <a class="
                w-full
                cursor-pointer
                uppercase
                font-semibold
                <?= ($page_title == 'Keuangan') ? " text-green-500 " : " text-gray-500 " ?>
                flex
                items-center
                py-3
                border-b-2 border-green-300
                lg:hidden
              " href="<?= base_url('/dashboard/keuangan') ?>">
            <span class="text-sm font-normal"> Keuangan </span>
          </a>
          <a class="
                w-full
                <?= ($user_info['email'] == 'admin@admin.com')?'lg:flex': 'hidden'?>
                cursor-pointer
                uppercase
                font-semibold
                <?= ($page_title == 'Admin') ? " text-green-500 " : " text-gray-500 " ?>
                hidden
                items-center
                py-3
                border-b-2 border-green-300
                
              " href="<?= base_url('/dashboard/admin') ?>">
            <span class="text-sm font-normal"> Admin </span>
          </a>
          <a class="
                w-full
                cursor-pointer
                uppercase
                font-semibold
                <?= ($page_title == 'Profile') ? " text-green-500 " : " text-gray-500 " ?>
                hidden
                items-center
                py-3
                border-b-2 border-green-300
                lg:flex
              " href="<?= base_url('/dashboard/profile') ?>">
            <span class="text-sm font-normal"> Profile </span>
          </a>
          <a class="w-full cursor-pointer uppercase font-semibold text-red-300 flex items-center py-3" href="<?= base_url('/auth/logout') ?>">
            <span class="text-sm font-normal"> Logout </span>
          </a>
        </div>
        <button id="closeDropdownMobile" onclick="closeDropdown()" class="w-full z-10 flex flex-row justify-end my-2">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M20 4L4 20M20 20L4 4L20 20Z" stroke="black" stroke-width="2" stroke-linecap="round" />
          </svg>
        </button>
      </div>
    </div>
    <!-- navbar  -->
    <!-- content  -->
    <div class="flex flex-col h-full overflow-y-scroll mx-4">