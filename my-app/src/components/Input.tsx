import React from 'react';
import { TextInput, StyleSheet } from 'react-native';

export default function Input({ placeholder, value, onChangeText, secureTextEntry = false }) {
  return (
    <TextInput
      style={styles.input}
      placeholder={placeholder}
      value={value}
      onChangeText={onChangeText}
      secureTextEntry={secureTextEntry}
    />
  );
}


const styles = StyleSheet.create({
  input: {
    height: 40,
    borderRadius: 6,
    width: 300,
    backgroundColor: '#B1DBBA',
    borderColor: '#ccc',
    borderWidth: 1,
    marginBottom: 20,
    paddingLeft: 10,
  }
});
