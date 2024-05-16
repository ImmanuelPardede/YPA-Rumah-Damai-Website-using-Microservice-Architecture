package model

import (
	"gorm.io/gorm"
)

type JenisKelamin struct {
	gorm.Model
	JenisKelamin string `gorm:"type:varchar(255)" json:"jenis_kelamin"`
}
