package config

import (
	"fmt"
	"os"

	"github.com/iqbalsiagian17/Service_Tahun_Kurikulum/model"
	"github.com/joho/godotenv"
	"gorm.io/driver/mysql"
	"gorm.io/gorm"
)

// SetupDatabaseConnection is creating a new connection to our database
func SetupDatabaseConnection() *gorm.DB {
	errEnv := godotenv.Load() // load .env file
	if errEnv != nil {        // jika error
		panic("Failed to load env file") // menampilkan pesan error
	}

	dbUser := os.Getenv("DB_USER") // ambil value dari DB_USER
	dbPass := os.Getenv("DB_PASS") // ambil value dari DB_PASS
	dbHost := os.Getenv("DB_HOST") // ambil value dari DB_HOST
	dbName := os.Getenv("DB_NAME") // ambil value dari DB_NAME

	dsn := fmt.Sprintf("%s:%s@tcp(%s:3306)/%s?charset=utf8&parseTime=True&loc=Local", dbUser, dbPass, dbHost, dbName)
	db, err := gorm.Open(mysql.Open(dsn), &gorm.Config{})
	if err != nil {
		panic("Failed to create a connection to database")
	}
	db.AutoMigrate(&model.TahunKurikulum{})
	return db
}

func CloseDatabaseConnection(db *gorm.DB) {
	dbSQL, err := db.DB()
	if err != nil {
		panic("Failed to close a connection to database")
	}
	dbSQL.Close()
}
