package model

import (
	"gorm.io/gorm"
)

type JenisPenyakit struct {
	gorm.Model
	JenisPenyakit string `gorm:"type:varchar(255)" json:"jenis_penyakit"`
	Deskripsi     string `gorm:"type:varchar(255)" json:"deskripsi"`
}
