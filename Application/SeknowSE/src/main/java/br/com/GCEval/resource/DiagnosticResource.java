package br.com.GCEval.resource;

import br.com.GCEval.model.Answerdata;
import br.com.GCEval.model.Company;
import br.com.GCEval.model.Diagnostic;
import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import br.com.GCEval.repository.DiagnosticRepository;
import javax.validation.Valid;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;

@RestController
@RequestMapping("/diagnostics")
public class DiagnosticResource {

    @Autowired
    private DiagnosticRepository diagnosticRepository;

    @GetMapping
    public List<Diagnostic> findAll() {
        return diagnosticRepository.findAll();
    }

    @GetMapping("/{id}")
    public Optional<Diagnostic> findById(@PathVariable Integer id) {

        Optional<Diagnostic> data = diagnosticRepository.findById(id);
        return data;

    }

    @PutMapping
    public Diagnostic update(@Valid @RequestBody Diagnostic c) {
        System.out.println(c);
        Diagnostic toReturn = diagnosticRepository.save(c);
        return toReturn;
    }

}
