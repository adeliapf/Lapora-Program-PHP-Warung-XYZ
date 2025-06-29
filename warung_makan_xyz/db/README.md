# Database Setup for Warung Makan XYZ

## Overview
This directory contains the database setup files for the Warung Makan XYZ web application.

## Files
- `koneksi.php` - Database connection configuration
- `warung_xyz.sql` - Complete database schema and sample data
- `setup_database.php` - PHP script to automatically setup the database
- `README.md` - This documentation file

## Database Schema

### Tables Created:

1. **users** - User authentication and management
   - id_user (Primary Key)
   - username (Unique)
   - password
   - role (admin/user)
   - nama_lengkap
   - created_at

2. **kategori_menu** - Food categories
   - id_kategori (Primary Key)
   - nama_kategori
   - deskripsi

3. **menu** - Food items/products
   - id_menu (Primary Key)
   - nama_menu
   - harga
   - id_kategori (Foreign Key)
   - gambar
   - deskripsi
   - status

4. **pesanan** - Customer orders
   - id_pesanan (Primary Key)
   - nama_pelanggan
   - id_menu (Foreign Key)
   - jumlah
   - total_harga
   - no_hp
   - tanggal_pesanan
   - status_pesanan

5. **detail_pesanan** - Order line items
   - id_detail (Primary Key)
   - id_pesanan (Foreign Key)
   - id_menu (Foreign Key)
   - jumlah
   - harga_satuan
   - subtotal

6. **file_upload** - Uploaded documents
   - id_file (Primary Key)
   - username (Foreign Key)
   - kategori
   - nama_file
   - tanggal_upload

## Setup Instructions

### Method 1: Using PHP Setup Script (Recommended)
1. Navigate to your web browser
2. Go to `http://localhost/project/warung_makan_xyz/db/setup_database.php`
3. The script will automatically create the database and tables
4. Check the output for any errors

### Method 2: Manual MySQL Setup
1. Open MySQL command line or phpMyAdmin
2. Execute the contents of `warung_xyz.sql`
3. Verify all tables are created successfully

### Method 3: Command Line
```bash
mysql -u root -p < warung_xyz.sql
```

## Default Login Credentials
- **Admin User:**
  - Username: `admin`
  - Password: `admin123`

## Sample Data Included

### Categories:
- Makanan Utama (Main Dishes)
- Makanan Ringan (Snacks)
- Minuman (Beverages)

### Menu Items:
- Nasi Goreng (Rp 15,000)
- Mie Ayam (Rp 12,000)
- Ayam Geprek (Rp 18,000)
- Sate Ayam (Rp 20,000)
- Kentang Goreng (Rp 10,000)
- Roti Bakar (Rp 8,000)
- Es Teh Manis (Rp 3,000)
- Jus Alpukat (Rp 10,000)
- Good Day Freeze (Rp 7,000)
- Nutrisari (Rp 5,000)

## Database Configuration
Make sure your `koneksi.php` file has the correct database settings:
```php
$koneksi = mysqli_connect("localhost", "root", "", "warung_xyz");
```

## Troubleshooting

### Common Issues:
1. **Connection Failed**: Check if MySQL/XAMPP is running
2. **Database Already Exists**: The script will use existing database
3. **Permission Denied**: Make sure MySQL user has CREATE privileges
4. **File Not Found**: Ensure you're running the script from the correct directory

### Verification Steps:
1. Check if database `warung_xyz` exists
2. Verify all 6 tables are created
3. Confirm sample data is inserted
4. Test login with admin credentials

## Security Notes
- Change default admin password after setup
- Use prepared statements for production
- Consider password hashing for better security
- Restrict database user permissions in production

## Support
If you encounter any issues during setup, check:
1. MySQL server is running
2. Correct database credentials in koneksi.php
3. PHP has MySQL extension enabled
4. File permissions are correct
