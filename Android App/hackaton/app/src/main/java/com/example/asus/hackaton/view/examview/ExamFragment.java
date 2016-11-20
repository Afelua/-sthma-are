package com.example.asus.hackaton.view.examview;

import android.content.Context;
import android.net.Uri;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

import com.example.asus.hackaton.API;
import com.example.asus.hackaton.R;
import com.example.asus.hackaton.model.ExamModelResponse;
import com.example.asus.hackaton.presenter.ExamPresenter;

import java.util.Date;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;
import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;


public class ExamFragment extends Fragment {
    private Button startExamButton;
    private ExamFragment examFragment;

    private String date;
    private String exam;
    String id;
    EditText startExamEditText;
    TextView resultTextView;

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        final ExamActivity examActivity = (ExamActivity) getActivity();
        id = examActivity.getMyData();
        View view = inflater.inflate(R.layout.fragment_exam, container, false);
        startExamButton = (Button) view.findViewById(R.id.start_exam_button);
        startExamEditText = (EditText) view.findViewById(R.id.start_exam_editText);
        resultTextView = (TextView)  view.findViewById(R.id.result_TextView);
        examFragment = new ExamFragment();

        final Date mDate = new Date();
        date = mDate.toString();
        Log.d("wrqwe",date); //work
        Log.d("honi",id);
        startExamButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                exam = startExamEditText.getText().toString();
                Log.d("kopa",exam);
                ExamPresenter examPresenter = new ExamPresenter(examFragment,id,exam,date);



            }
        });


        return view;
    }
   public void setResultTextView(String percent){
       //Log.d("FixPrice",percent);
         resultTextView.setText(percent);
    }

}


