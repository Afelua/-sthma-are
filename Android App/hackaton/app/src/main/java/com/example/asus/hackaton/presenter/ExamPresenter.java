package com.example.asus.hackaton.presenter;

import android.util.Log;
import android.widget.Toast;

import com.example.asus.hackaton.API;
import com.example.asus.hackaton.model.ExamModelResponse;
import com.example.asus.hackaton.view.examview.ExamFragment;

import java.util.Date;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;
import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;



public class ExamPresenter {
    ExamFragment examFragment;
    String id;
    String exam;
    String date;

    public ExamPresenter(ExamFragment mexamFragment, String mid, String mexam,String mdate) {
        this.examFragment = mexamFragment;
        this.id = mid;
        this.exam = mexam;
        this.date = mdate;

        Retrofit retrofit = new Retrofit.Builder()
                .baseUrl("https://asthmacare.ru/")
                .addConverterFactory(GsonConverterFactory.create())
                .build();
        retrofit.create(API.class).getExamModelResponse(id, exam, date).enqueue(new Callback<ExamModelResponse>() {
            @Override
            public void onResponse(Call<ExamModelResponse> call, Response<ExamModelResponse> response) {
                Log.d("Response",response.body().getPercent());
               String percent = response.body().getPercent().toString();
               examFragment.setResultTextView(percent);

            }

            @Override
            public void onFailure(Call<ExamModelResponse> call, Throwable t) {
                Log.d("Response",t.toString());
            }
        });

    }





}
