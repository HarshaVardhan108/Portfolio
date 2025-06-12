// Import required modules
import mysql from 'mysql2/promise';  // MySQL database driver
import dotenv from 'dotenv';          // Environment variables loader

dotenv.config();  // Load environment variables from .env file

// Database configuration
// Uses environment variables with fallback values
const dbConfig = {
  host: process.env.DB_HOST || 'localhost',  // Database host
  user: process.env.DB_USER || 'root',       // Database user
  password: process.env.DB_PASSWORD || '',   // Database password
  database: process.env.DB_NAME || 'portfolio_contact_form',  // Database name
  waitForConnections: true,                  // Wait for available connections
  connectionLimit: 10,                       // Maximum number of connections
  queueLimit: 0                             // No limit on queued connections
};

// Create a connection pool for database operations
const pool = mysql.createPool(dbConfig);

// Execute a database query with parameters
// @param {string} sql - SQL query string
// @param {Array} params - Parameters to be used in query
// @returns {Promise} - Promise that resolves with query results
export async function query(sql, params) {
  try {
    const [results] = await pool.execute(sql, params);
    return results;
  } catch (error) {
    console.error('Database query error:', error);
    throw error;
  }
}

export async function createContactsTable() {
  const sql = `
    CREATE TABLE IF NOT EXISTS contacts (
      id INT AUTO_INCREMENT PRIMARY KEY,
      name VARCHAR(100) NOT NULL,
      email VARCHAR(100) NOT NULL,
      subject VARCHAR(200),
      message TEXT NOT NULL,
      created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )
  `;
  
  try {
    await query(sql);
    console.log('Contacts table is ready');
  } catch (error) {
    console.error('Error creating contacts table:', error);
    throw error;
  }
}

export default {
  query,
  createContactsTable
};
