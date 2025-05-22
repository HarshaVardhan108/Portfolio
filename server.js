import express from "express";
import { connectDB, Contact } from "./connectDB/db.js";
import cors from "cors";
import dotenv from "dotenv";
const app = express();

// Middleware
app.use(cors());
app.use(express.json());
app.use(express.static(".")); // Serve static files from current directory
dotenv.config();
// Connect to MongoDB
connectDB();

// POST endpoint for contact form
app.post("/api/contact", async (req, res) => {
  try {
    const { name, email, subject, message } = req.body;

    // Create new contact entry
    const contact = new Contact({
      name,
      email,
      subject,
      message,
    });

    // Save to database
    await contact.save();

    res.status(201).json({ message: "Message sent successfully!" });
  } catch (error) {
    console.error("Error saving contact:", error);
    res.status(500).json({ message: "Error sending message" });
  }
});

// GET endpoint to retrieve messages (optional, for admin purposes)
app.get("/api/contact", async (req, res) => {
  try {
    const messages = await Contact.find({}).sort({ createdAt: -1 });
    res.json(messages);
  } catch (error) {
    console.error("Error fetching messages:", error);
    res.status(500).json({ message: "Error fetching messages" });
  }
});

const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
  console.log(`Server running on port ${PORT}`);
});
