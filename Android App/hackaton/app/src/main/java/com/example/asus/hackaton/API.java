package com.example.asus.hackaton;

import com.example.asus.hackaton.model.ExamModelResponse;
import com.example.asus.hackaton.model.registrationmodel.AddUserResponse;
import com.example.asus.hackaton.model.loginingmodel.LoginUserResponse;

import retrofit2.Call;
import retrofit2.http.GET;
import retrofit2.http.Query;

/**
 * Created by Asus on 19.11.2016.
 */

public interface API {
    @GET("patient_reg.php")
    Call<AddUserResponse> getAddUserResponse(@Query("fname") String fname, @Query("name") String name, @Query("sname") String sname,
                                     @Query("sex") String gender, @Query("growth") int growth, @Query("b_date") String birthday,
                                     @Query("login") String login,@Query("pass") String password);

    @GET("patient_log.php")
    Call<LoginUserResponse> getLoginUserResponse(@Query("login") String login,
                                                 @Query("pass") String password);

    @GET("patient_exam.php")
    Call<ExamModelResponse> getExamModelResponse(@Query("id") String id,@Query("exam") String exam,
                                                 @Query("time") String date);
}
