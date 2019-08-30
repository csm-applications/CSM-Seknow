package br.com.GCEval.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import br.com.GCEval.model.Permission;
import java.util.Optional;

public interface PermissionRepository extends JpaRepository<Permission, Integer> {
	public Optional<Permission> findById(Integer id);
}
