
//activity_main.xml

<?xml version="1.0" encoding="utf-8"?>
<androidx.constraintlayout.widget.ConstraintLayout xmlns:android="http://schemas.android.com/apk/res/android"
    xmlns:app="http://schemas.android.com/apk/res-auto"
    xmlns:tools="http://schemas.android.com/tools"
    android:layout_width="match_parent"
    android:layout_height="match_parent"
    tools:context=".MainActivity">

    <EditText
        android:id="@+id/firstnum"
        android:layout_width="252dp"
        android:layout_height="66dp"
        android:ems="10"
        android:inputType="textPersonName"
        android:text="num1"
        app:layout_constraintBottom_toBottomOf="parent"
        app:layout_constraintEnd_toEndOf="parent"
        app:layout_constraintStart_toStartOf="parent"
        app:layout_constraintTop_toTopOf="parent"
        app:layout_constraintVertical_bias="0.21" />

    <EditText
        android:id="@+id/secondnum"
        android:layout_width="254dp"
        android:layout_height="67dp"
        android:layout_marginTop="36dp"
        android:ems="10"
        android:inputType="textPersonName"
        android:text="num2"
        app:layout_constraintBottom_toBottomOf="parent"
        app:layout_constraintEnd_toEndOf="parent"
        app:layout_constraintHorizontal_bias="0.515"
        app:layout_constraintStart_toStartOf="parent"
        app:layout_constraintTop_toBottomOf="@+id/firstnum"
        app:layout_constraintVertical_bias="0.052" />

    <Button
        android:id="@+id/button"
        android:layout_width="93dp"
        android:layout_height="55dp"
        android:layout_marginTop="120dp"
        android:text="Add"
        app:layout_constraintBottom_toBottomOf="parent"
        app:layout_constraintEnd_toEndOf="parent"
        app:layout_constraintStart_toStartOf="parent"
        app:layout_constraintTop_toBottomOf="@+id/secondnum"
        app:layout_constraintVertical_bias="0.0" />

    <EditText
        android:id="@+id/result"
        android:layout_width="259dp"
        android:layout_height="51dp"
        android:layout_marginTop="76dp"
        android:ems="10"
        android:inputType="textPersonName"
        android:hint="result"
        app:layout_constraintBottom_toBottomOf="parent"
        app:layout_constraintEnd_toEndOf="parent"
        app:layout_constraintHorizontal_bias="0.526"
        app:layout_constraintStart_toStartOf="parent"
        app:layout_constraintTop_toBottomOf="@+id/button"
        app:layout_constraintVertical_bias="0.0" />

</androidx.constraintlayout.widget.ConstraintLayout>

//mainactivity.java

package com.example.myapplication;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;


public class MainActivity extends AppCompatActivity {
    private EditText firstnum,secondnum;
    private Button add;
    private TextView result;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        firstnum=(EditText) findViewById(R.id.firstnum);
        secondnum=(EditText) findViewById(R.id.secondnum);
        add=(Button) findViewById(R.id.button);
        result=(TextView) findViewById(R.id.result);

        add.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                int n1,n2,n3;
                n1=Integer.parseInt(firstnum.getText().toString());
                n2=Integer.parseInt(secondnum.getText().toString());
                n3=n1+n2;
                result.setText(String.valueOf(n3));
            }
        });

    }
}
