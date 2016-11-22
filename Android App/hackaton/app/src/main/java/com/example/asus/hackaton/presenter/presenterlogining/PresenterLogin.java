package com.example.asus.hackaton.presenter.presenterlogining;

import android.content.Intent;
import android.util.Log;
import android.widget.Toast;

import com.example.asus.hackaton.API;
import com.example.asus.hackaton.model.loginingmodel.LoginUserResponse;
import com.example.asus.hackaton.view.examview.ExamActivity;
import com.example.asus.hackaton.view.loginingview.LoginActivity;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;
import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;

/**
 * Created by Asus on 19.11.2016.
 */

public class PresenterLogin {
    private String login;
    private String password;
    final LoginActivity loginActivity;

    public PresenterLogin(String mlogin, String mpassword,LoginActivity mLoginActivity) {
        this.login = mlogin;
        this.password = mpassword;
        this.loginActivity =  mLoginActivity;




        Retrofit retrofit = new Retrofit.Builder()
                .baseUrl("https://asthmacare.ru/")
                .addConverterFactory(GsonConverterFactory.create())
                .build();
        retrofit.create(API.class).getLoginUserResponse(login, password).enqueue(new Callback<LoginUserResponse>() {
            @Override
            public void onResponse(Call<LoginUserResponse> call, Response<LoginUserResponse> response) {
           // Log.d("myPresenterResult" , response.body().getResult());

                if(response.body().getResult().equals("true")){
                    Intent intent = new Intent(loginActivity, ExamActivity.class);
                    intent.putExtra("id",response.body().getId());
                    Log.d("ppp",response.body().getId());//work
                    loginActivity.startActivity(intent);
                }else{
                    Toast.makeText(loginActivity,"Вы ввели неправильный пасс",Toast.LENGTH_LONG);
                }


            }

            @Override
            public void onFailure(Call<LoginUserResponse> call, Throwable t) {

            }
        });
    }
}
