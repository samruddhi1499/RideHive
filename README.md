# RideHive

## Overview
A platform for users to rent bikes and scooters online. Vendors can list vehicles, and admins manage platform operations.

## MVP
- **Admin Module**: Manage users, vehicles, bookings, and feedback.
- **User Module**: Register, browse vehicles, book, and pay online.
- **Vendor Module**: Manage vehicle listings and bookings.
- **Payment Module**: Secure payment processing.

## Setup and Access the Application
- Clone the github Link: ``
- Open Windows Powershell and navigate to project folder 
- Remove the `.\vendor` using command `Remove-Item -Recurse -Force .\vendo`
- Run following commands:
    - `composer install `
    - `php artisan key:generate`
    - `npm install` and `npm run build`
- To run the application Run the following commands:
    - `npm run dev`
    - Answer `N` to the question
    - `php artisan serve`
- Navigate to `localhost:8000/`

## Team Members and Contribution
1. **Samruddhi Chavan [N01604191]**: Database Design, Public Views (Home, Login, Register) & Payment Module  
2. **Sruthi Pandiath [N01618202]**: Vendor Module & Testing
3. **Saloni Patel [N01603895]**: Admin Module  
4. **Mitali Sisodia [N01621572]**: User Module & UML

