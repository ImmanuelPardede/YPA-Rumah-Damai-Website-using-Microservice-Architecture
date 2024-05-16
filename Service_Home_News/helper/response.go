package helper

import (
	"strings"
)

// response is used for static shape json return
// umpan balik respon dibuat dalam bentuk JSON
type Response struct {
	Status  bool        `json:"status"`
	Message string      `json:"message"`
	Errors  interface{} `json:"errors"`
	Data    interface{} `json:"data"`
}

// EmptyObj object is used when data doesnt want to be null on json
type EmptyObj struct{} //object kosong digunakan ketika data tidak ingin menjadi null pada json

// BuildResponse methode is to inject data value to dynamic success response
func BuildResponse(status bool, message string, data interface{}) Response { //membangun respon yang dinamis dengan mengisi nilai data
	res := Response{
		Status:  status,
		Message: message,
		Errors:  nil,
		Data:    data,
	} //membangun respon dengan nilai status, pesan, error, dan data
	return res //mengembalikan nilai res
}

// BuildErrorResponse method is to inject data value to dynamic failed response
func BuildErrorResponse(message string, err string, data interface{}) Response { //membangun respon yang dinamis dengan mengisi nilai data
	splitedError := strings.Split(err, "\n") //memecah error berdasarkan baris
	res := Response{
		Status:  false,
		Message: message,
		Errors:  splitedError,
		Data:    data,
	} //membangun respon dengan nilai status, pesan, error, dan data
	return res //mengembalikan nilai res
}
