# skeleton
Using this application skeleton to build your app quickly with the phoole framework

## directory layout

- `app/`
  your application backend files.
  
- `local/`
  host specific files. usually for local cache files. should be mounted from local host.
  
- `shared/`
  files shared among hosts and changed during runtime. should be mounted from network.
  
  - `public/`
    front end files.

- `system/`
  framework related files and scripts.